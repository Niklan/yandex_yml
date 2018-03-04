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

### Categories explanation

A simple way to understand how it works is look at categories generation. When you add category to generator using `addCategory(YandexYmlCategory $category)` it will store this objects in own property. If you look at it, you will see all of them.

![categories in generator](https://i.imgur.com/EcurQa9.png)

When you call `generateFile()` the generator will cycle over each this object and call `::toArray()` method. This method will parse annotations and convert it to array.

![to array result](https://i.imgur.com/6QJ6kFX.png)

As you can see, properties of `YandexYmlCategory` is goes to their places according to property annotations.

After it, it just write it to XML, and you will get result.

![result in xml](https://i.imgur.com/IIhv3C3.png)

![Explanation on image](https://i.imgur.com/3YxV9IJ.png)