# Changelog

## [Unreleased][unreleased]

**This release is not BC with alpha4.**

- Improved performance since alpha4.
  - **Synthetic test**. Tested on 20000 offers. Services has been replaced by Value Objects and object is no more converted to an array, the values get directly from objects. Performance test code: [alpha4](https://pastebin.com/VyDkvtLn) and [alpha5](https://pastebin.com/Le1L9WZk) (new)
    * Generation time reduced from 331 sec to 1.5 sec.
    * Memory peak usage reduced from 977 mb to 122 mb.
  - **Real world test**. Drupal Commerce 2, 170000 products.
    * Generation time reduced from TBD.
    * Memory peak usage reduced from TBD.
- Annotation-based markup replaced by objects.
  - TLDR; Annotation based realization is overall has better performance, but harder to maintain in case of this module.
  - Annotations are showing great performance in the last tests. They are slower by 30% than objects, but memory efficient by 400%. However the codebase for annotations is bigger at 2-3 times, it's harder to maintain and there is no reason for it since YML is standardized. This is the great tool and you can see last implementations by hash below this changelog, but for now, I'll go with objects.
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