<?php

use function Ramsey\Uuid\v1;

return [
    // Navigation
    'navigation' => [
        'dashboard' => 'Dashboard',
        'settings' => 'Settings',
        'users' => 'Users',
        'books' => 'Books',
        'students' => 'Students',
        'members' => 'Members',
    ],

    'management' => [
        'users' => 'Users Management',
        'books' => 'Books Management',
        'members' => 'Members Management',
        'students' => 'Students Management'
    ],

    // Common actions
    'actions' => [
        'create' => 'Create',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'save' => 'Save',
        'cancel' => 'Cancel',
    ],

    // Form labels
    'forms' => [
        'name' => 'Name',
        'surname' => 'Surname',
        'email' => 'Email',
        'password' => 'Password',
        'status' => 'Status',
        'role' => 'Role',
        'job' => 'Job',
        'sex' => 'Gender',
        'birthdate' => 'Birth Date',
        'place' => 'Birth Place',
        'hobby' => 'Hobby',
        'help' => 'What can be provided',
        'residence' => 'Residence',
        'tel' => 'Phone Number',
        'photo' => 'Photo',
        'created_at' => 'Creation Date',
        'dad_job' => 'Father\'s Job',
        'mom_job' => 'Mother\'s Job',
        'study_local' => 'Location',
        'dad_tel' => 'Father\'s Phone Number',
        'scholar_year' => 'Academic Year',
        'copies' => 'Number of Copies',
        'note' => 'Notes',
        'parts' => 'Number of Parts',
        'publisher' => 'Publisher and Distributor',
        'documentation' => 'Collected and Documented by',
        'review' => 'Reviewed and Corrected by',
        'author_name' => 'Author',
        'title' => 'Book Title',
        'field' => 'Field',
    ],

    // Messages
    'messages' => [
        'created' => 'Created Successfully',
        'updated' => 'Updated Successfully',
        'deleted' => 'Deleted Successfully',
    ],

    // Table columns
    'table' => [
        'id' => 'ID',
        'created_at' => 'Creation Date',
        'updated_at' => 'Update Date',
    ],
];