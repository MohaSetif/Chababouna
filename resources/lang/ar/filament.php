<?php

use function Ramsey\Uuid\v1;

return [
    // Navigation
    'navigation' => [
        'dashboard' => 'لوحة التحكم',
        'settings' => 'الإعدادات',
        'users' => 'المستخدمين',
        'books' => 'الكتب',
        'students' => 'الطلاب',
        'members' => 'الأعضاء',
    ],

    'management' => [
        'users' => 'إدارة المستخدمين',
        'books' => 'إدارة الكتب',
        'members' => 'إدارة الأعضاء',
        'students' => 'إدارة الطلاب'
    ],

    // Common actions
    'actions' => [
        'create' => 'إضافة',
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'save' => 'حفظ',
        'cancel' => 'إلغاء',
    ],

    // Form labels
    'forms' => [
        'name' => 'الاسم',
        'surname' => 'اللقب',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'status' => 'الحالة',
        'role' => 'الدور',
        'job' => 'المهنة',
        'sex' => 'الجنس',
        'birthdate' => 'تاريخ الميلاد',
        'place' => 'مكان الميلاد',
        'hobby' => 'الهواية',
        'help' => 'ما يمكن تقديمه',
        'residence' => 'الإقامة',
        'tel' => 'رقم الهاتف',
        'photo' => 'الصورة',
        'created_at' => 'تاريخ الإضافة',
        'dad_job' => 'مهنة الولي',
        'mom_job' => 'مهنة الأم',
        'study_local' => 'المقر',
        'dad_tel' => 'رقم هاتف الولي',
        'scholar_year' => 'السنة الدراسية',
        'copies' => 'عدد النسخ', 
        'note' => 'ملاحظات', 
        'parts' => 'عدد الأجزاء', 
        'publisher' => 'دار النشر و التوزيع', 
        'documentation' => 'جمعها و دونها', 
        'review' => 'ضبطه و صححه', 
        'author_name' => 'المؤلف', 
        'title' => 'عنوان الكتاب', 
        'field' => 'المجال',
    ],

    // Messages
    'messages' => [
        'created' => 'تم الإنشاء بنجاح',
        'updated' => 'تم التحديث بنجاح',
        'deleted' => 'تم الحذف بنجاح',
    ],

    // Table columns
    'table' => [
        'id' => 'المعرف',
        'created_at' => 'تاريخ الإنشاء',
        'updated_at' => 'تاريخ التحديث',
    ],
];