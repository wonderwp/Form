# Changelog

## 1.0.11

- Added documentation link to readme
- Better translatable field handling 
    - New trait for that `TranslatableFieldTrait`
    - If no translation available, uses cat name by default, which means translating is no longer mandatory
- Minor breaking change : Removed the WW_THEME_TEXTDOMAIN constant to customize default textdomain. It was too opinionated. You now have the `wwp_forms.translatable_field.default_textdomain` filter available if you want to change the default textdomain.  
