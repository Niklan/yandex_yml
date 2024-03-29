# Changelog

## [Unreleased][unreleased]

## [1.2]

* PR [#4](https://github.com/Niklan/yandex_yml/pull/4): Create temporary file only when generating the writer output.

## [1.1]

* Improved Drupal 9 support.

## [1.0]

* Drupal 9 support.

## [1.0-alpha5]

**This release is not BC with alpha4.**

- Improved performance since alpha4.
  - **Synthetic test**. Tested on 20000 offers. Services has been replaced by Value Objects and object is no more converted to an array, the values get directly from objects. Performance test code: [alpha4](https://pastebin.com/VyDkvtLn) and [alpha5](https://pastebin.com/Le1L9WZk) (new)
    * Generation time reduced from 331 sec to 1.5 sec.
    * Memory peak usage reduced from 977 mb to 122 mb.
  - **Real world test**. Drupal 8.7, 17157 products (in nodes).
    * Generation time reduced from 319.85 sec to 126.36 sec.
    * Memory peak usage reduced from 1643.33MB to 215.33MB.
    * The most consuming part of this - load entities and process them. So module is not bottleneck anymore for performance according to synthetic tests. F.e. same project but products ranged from 0 to 1000 (1000 products only), the results is much better: 2.29 sec and 81.77 mb memory peak. The more entities you load to process, the more performance will drop. You can improve it significantly by clearing static cache for entities, but there is a lot of process under the hood which cause drop and you can't access them unless write a custom loading process. At least why do we need to clear static cache, when it better to not write at all, but we can't do it with core tools, or I didn't find them for now. In other words, with a lot of products, the main performance bottleneck will be `EntityStorageInterface::load()`.
- Annotation-based markup replaced by objects.
  - TLDR; Annotation based realization is overall has better performance (in version which was written for this version, alpha4 was horrible), but harder to maintain in case of this module.
  - Annotations are showing great performance in the last tests. They are slower by 30% than objects, but memory efficient by 400%. However the codebase for annotations is bigger at 2-3 times, it's harder to maintain and there is no reason for it since YML is standardized. This is the great tool and you can see last implementations by hash below this changelog, but for now, I'll go with objects.
- Improved code quality.
- Improved easy to write code because of moving to objects instead of shared services.
- Added support for `pickup-options`.
- Added support for `enable_auto_discounts`.
- Removed support for all old elements.
- All elements for all offers synced with current YML standard. And improved which offer cant has which values. By default you can't create invalid YML structure.

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


[unreleased]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha5...HEAD
[1.0-alpha5]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha4...8.x-1.0-alpha5
[1.0-alpha4]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha3...8.x-1.0-alpha4
[1.0-alpha3]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha1...8.x-1.0-alpha3
[1.0-alpha2]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha1...8.x-1.0-alpha2
[1.0]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0-alpha5...8.x-1.0
[1.1]: https://github.com/Niklan/yandex_yml/compare/8.x-1.0...8.x-1.1
[1.2]: https://github.com/Niklan/yandex_yml/compare/8.x-1.1...8.x-1.2