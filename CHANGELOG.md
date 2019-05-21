# Changelog

## [Unreleased][unreleased]

- Improved performance since alpha4. Tested on 20000 offers. Services has been replaced by Value Objects and object is no more converted to an array, the values get directly from objects. Performance test code: [alpha4](https://pastebin.com/VyDkvtLn) and [alpha5](https://pastebin.com/Le1L9WZk) (new)

  * Generation time reduced from 331 sec to 1.7 sec.
  * Memory peak usage reduced from 977 mb to 54 mb.
  * More heavy [test](https://pastebin.com/4Em2RH3u) results:
    - Total offers: 80000 (each type x10000)
    - Time: 7.4 sec
    - Memory peak: 109 mb.

- Improved code quality.
- Added support for `pickup-options`.
- Added support for `enable_auto_discounts`.

_Last commit with annotated objects with insane performance 15ccae07f88f972cfd028164caf16ec92ec6e383. 331 sec > 1.7 sec, 977mb > 54mb._

## [1.0-alpha4]

- By [Batkor](https://github.com/Niklan/yandex_yml/issues/1). Added method to return generated XML as string using meory. So you can now create custom controllers and other suff.
- Updated documentation.

## [1.0-alpha3]

- **Breaking change.** Default filename was changed from products.yml to products.xml, because it's allowed by Yandex, and this is better for XML file.

## [1.0-alpha2]

No breaking changes.

- Added first example.
- Fixed annotation for Shop info.


[unreleased]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha4...HEAD
[1.0-alpha4]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha3...8.x-1.0-alpha4
[1.0-alpha3]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha1...8.x-1.0-alpha3
[1.0-alpha2]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha1...8.x-1.0-alpha2