# Changelog

## TODO

- Spreadsheet with offer types, their possible values, what's required, and what's not. This will help to modify offers properties and objects to be more accurate and detect new and old properties.

## Current dev changes

- Improved performance since alpha4. Tested on 20000 offers. Services has been replaced by Value Objects and object is no more converted to an array, the values get directly from objects. Performance test code: [alpha4](https://pastebin.com/VyDkvtLn) and [alpha5](#todo) (new)

  * Generation time reduced from 331 sec to TODO sec.
  * Memory peak usage reduced from 977 mb to TODO mb.

- Improved code quality.
- Added support for `pickup-options`.
- Added support for `enable_auto_discounts`.

## 8.x-1.0-alpha4

- By [Batkor](https://github.com/Niklan/yandex_yml/issues/1). Added method to return generated XML as string using meory. So you can now create custom controllers and other suff.
- Updated documentation.

## 8.x-1.0-alpha3

- **Breaking change.** Default filename was changed from products.yml to products.xml, because it's allowed by Yandex, and this is better for XML file.

## 8.x-1.0-alpha2

No breaking changes.

- Added first example.
- Fixed annotation for Shop info.