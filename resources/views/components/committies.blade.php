<section id="committees" class="py-16 bg-gradient-to-br from-white to-green-50">
    <div class="container mx-auto px-6 max-w-6xl">
        <h2 class="text-4xl font-bold text-green-800 mb-6 text-center">لــجـانـنـا</h2>
        <p class="text-lg text-gray-700 mb-12 leading-relaxed text-center">
            تساعد الجمعية العامة لجان دائمة، مكلفة بدراسة المسائل المتعلقة بأهداف الجمعية. اللجان الدائمة هي ثلاثة:
        </p>

        <div class="space-y-4">
            <template x-data="{
                committees: [
                    {
                        name: 'لجنة التربية و التعليم',
                        cells: [
                            {
                                name: 'خلية التعليم القرآني و فيها أربع أقسام:',
                                items: [
                                    'قسم تحفيظ القرآن الكريم',
                                    'قسم مراجعة القرآن الكريم',
                                    'قسم تصحيح التلاوة',
                                    'قسم الإجازات القرآنية'
                                ]
                            },
                            {
                                name: 'خلية اللغة العربية و اللغات الحية:',
                                items: [
                                    'قسم اللغة العربية',
                                    'قسم اللغة الفرنسية',
                                    'قسم اللغة الانجليزية'
                                ]
                            },
                            {
                                name: 'خلية تعليم الإعلام الآلي'
                            },
                            {
                                name: 'خلية المسرح و الفنون التشكيلية و التربية المدنية:',
                                items: [
                                    'قسم المسرح',
                                    'قسم الرسم و الفنون التشكيلية',
                                    'قسم التربية المدنية'
                                ]
                            },
                            {
                                name: 'خلية الاستشارات النفسية:',
                                items: [
                                    'قسم الاستشارات النفسية',
                                    'قسم الأرطفوني',
                                    'قسم الاستشارات الأسرية و تربية الأطفال'
                                ]
                            },
                            {
                                name: 'خلية الإرشاد الديني و الاستشارات القانونية:',
                                items: [
                                    'قسم الإرشاد الديني',
                                    'قسم الاستشارات القانونية'
                                ]
                            }
                        ]
                    },
                    { name: 'لجنة الإعلام و الاتصال', content: 'محتوى لجنة الإعلام و الاتصال' },
                    { name: 'لجنة التجهيز و الصيانة', content: 'محتوى لجنة التجهيز و الصيانة و الوسائل' }
                ]
            }" x-for="committee in committees" :key="committee.name">
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                    <button @click="open = !open" 
                            class="w-full text-right py-4 px-6 flex justify-between items-center hover:bg-green-50 rounded-lg transition-colors duration-200"
                            :class="{ 'rounded-b-none': open }">
                        <span class="font-semibold text-md md:text-2xl text-green-700" x-text="committee.name"></span>
                        <svg class="w-6 h-6 text-green-600 transform transition-transform duration-200" 
                             :class="{ 'rotate-180': open }"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition-all ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition-all ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-4"
                         class="px-6 pb-4 bg-white rounded-b-lg" x-cloak>
                        <div class="space-y-6 pt-4 border-t border-green-100" x-show="committee.cells">
                            <template x-for="cell in committee.cells" :key="cell.name">
                                <div class="transform transition-all duration-200 hover:translate-x-2">
                                    <h4 class="text-xl font-semibold text-green-600 mb-3 flex items-center">
                                        <span class="w-2 h-2 bg-green-500 rounded-full ml-2"></span>
                                        <span x-text="cell.name"></span>
                                    </h4>
                                    <ul x-show="cell.items" class="list-none space-y-2 pr-8">
                                        <template x-for="item in cell.items" :key="item">
                                            <li class="flex items-center text-gray-700">
                                                <span class="w-1.5 h-1.5 bg-green-400 rounded-full ml-2"></span>
                                                <span x-text="item"></span>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </template>
                        </div>
                        <p x-show="committee.content" class="text-gray-700 py-2 px-4" x-text="committee.content"></p>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
