## How it works

For those who interested how this module is work, this section for you, otherwise just skip it.

At first it can be a little bit confusing, because you will not find specific code for generation XML file, it's very simple in `YandexYmlGenerator`.

For generation of XML module provide several annotations:

- YandexYmlElement — define XML element.
- YandexYmlAttribute — to set attributes of XML element.
- YandexYmlValue — set value of element.
- YandexElementWrapper - child elements with specific wrapper. Like categories and it category.
- YandexElementWrapperAttribute - attributes for child wrapper if it required.

All object and their properties is mapped using this annotations. When file need to be generated, this annotations will be read and converted to array using `YandexYmlToArrayTrait`. The result array may looks like:

![Array example](https://i.imgur.com/nYSUEf9.png)

This array is pass through `YandexYmlGenerator::writeElementFromArray()` and according to array structure it will write it to XML.

