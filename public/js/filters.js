// Cache DOM elements and initialize state
const tableFilters = {
  elements: {
    searchBar: document.getElementById("SearchBar"),
    fieldFilter: document.getElementById("FieldFilter"),
    writerFilter: document.getElementById("WriterFilter"),
    publisherFilter: document.getElementById("PublisherFilter"),
    table: document.getElementById("userTable"),
  },
  debounceTimer: null,
  lastSearch: {
    query: '',
    field: '',
    writer: '',
    publisher: ''
  }
};

// Define column indices for better maintainability
const COLUMNS = {
  ID: 0,
  DATE: 1,
  FIELD: 2,
  TITLE: 3,
  WRITER: 4,
  REVIEW: 5,
  DOCUMENTATION: 6,
  PUBLISHER: 7,
  PARTS: 8,
  NOTE: 9,
  COPIES: 10,
  PHOTO: 11
};

// Debounce function to limit filter execution
function debounce(func, wait) {
  return function executedFunction(...args) {
    const later = () => {
      tableFilters.debounceTimer = null;
      func(...args);
    };
    clearTimeout(tableFilters.debounceTimer);
    tableFilters.debounceTimer = setTimeout(later, wait);
  };
}

// Function to check if a cell's text matches a search term
function matchesSearchTerm(cellText, searchTerm) {
  if (!searchTerm) return true;
  if (!cellText) return false;
  
  const normalizedCell = cellText.toLowerCase().trim();
  const normalizedSearch = searchTerm.toLowerCase().trim();
  
  // Support for exact phrase matching with quotes
  if (normalizedSearch.startsWith('"') && normalizedSearch.endsWith('"')) {
    const phrase = normalizedSearch.slice(1, -1);
    return normalizedCell === phrase;
  }
  
  // Support for OR operator using |
  if (normalizedSearch.includes('|')) {
    return normalizedSearch.split('|')
      .some(term => normalizedCell.includes(term.trim()));
  }
  
  // Default partial match
  return normalizedCell.includes(normalizedSearch);
}

// Main filter function
function applyFilters() {
  const { elements } = tableFilters;
  const tbody = elements.table.getElementsByTagName('tbody')[0];
  const rows = Array.from(tbody.getElementsByTagName('tr'));
  
  // Get current filter values
  const filters = {
    query: elements.searchBar.value.toLowerCase().trim(),
    field: elements.fieldFilter.value.toLowerCase().trim(),
    writer: elements.writerFilter.value.toLowerCase().trim(),
    publisher: elements.publisherFilter.value.toLowerCase().trim()
  };
  
  // Performance optimization: only process if filters have changed
  if (JSON.stringify(filters) === JSON.stringify(tableFilters.lastSearch)) {
    return;
  }
  tableFilters.lastSearch = { ...filters };
  
  // Create document fragment for better performance
  const fragment = document.createDocumentFragment();
  let visibleCount = 0;
  
  try {
    rows.forEach(row => {
      const cells = row.getElementsByTagName('td');
      if (!cells.length) return;
      
      // Check each filter condition
      const matchConditions = {
        search: !filters.query || Array.from(cells).some(cell => 
          matchesSearchTerm(cell.textContent, filters.query)
        ),
        field: !filters.field || 
          matchesSearchTerm(cells[COLUMNS.FIELD].textContent, filters.field),
        writer: !filters.writer || 
          matchesSearchTerm(cells[COLUMNS.WRITER].textContent, filters.writer),
        publisher: !filters.publisher || 
          matchesSearchTerm(cells[COLUMNS.PUBLISHER].textContent, filters.publisher)
      };
      
      // Show/hide row based on all conditions
      const showRow = Object.values(matchConditions).every(Boolean);
      row.style.display = showRow ? '' : 'none';
      
      if (showRow) {
        fragment.appendChild(row.cloneNode(true));
        visibleCount++;
      }
    });
    
    // Update table efficiently
    tbody.innerHTML = '';
    tbody.appendChild(fragment);
    
    // Update UI with results count
    updateResultsCount(visibleCount, rows.length);
    
  } catch (error) {
    console.error('Error applying filters:', error);
    showErrorMessage('حدث خطأ أثناء تصفية النتائج. يرجى المحاولة مرة أخرى.');
  }
}

// Helper function to show error messages
function showErrorMessage(message) {
  const errorDiv = document.createElement('div');
  errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4';
  errorDiv.role = 'alert';
  errorDiv.textContent = message;
  
  const container = tableFilters.elements.table.parentElement;
  container.insertBefore(errorDiv, tableFilters.elements.table);
  
  setTimeout(() => errorDiv.remove(), 5000);
}

// Helper function to update results count
function updateResultsCount(visibleCount, totalCount) {
  const countDiv = document.getElementById('resultsCount') || document.createElement('div');
  countDiv.id = 'resultsCount';
  countDiv.className = 'text-gray-600 mt-4';
  countDiv.textContent = `عرض ${visibleCount} من ${totalCount} كتاب`;
  
  const container = tableFilters.elements.table.parentElement;
  container.insertBefore(countDiv, tableFilters.elements.table);
}

// Set up event listeners with debouncing
document.addEventListener('DOMContentLoaded', () => {
  const { elements } = tableFilters;
  const debouncedFilter = debounce(applyFilters, 300);
  
  elements.searchBar.addEventListener('input', debouncedFilter);
  elements.fieldFilter.addEventListener('change', applyFilters);
  elements.writerFilter.addEventListener('change', applyFilters);
  elements.publisherFilter.addEventListener('change', applyFilters);
  
  // Initial filter application
  applyFilters();
});