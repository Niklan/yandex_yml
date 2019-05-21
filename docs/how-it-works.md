## How it works

### XML annotations

| Annotation                    | Scope  | Description |
| ----------------------------- | ------ | ----------- |
| `@YandexYmlXmlRootElement`    | class  | Defines the XML root element. |
| `@YandexYmlXmlElement`        | method | Maps a method value to an specific XML element |
| `@YandexYmlXmlAttribute`      | method | Maps a method value as an attribute to an XML attribute |
| `@YandexYmlXmlValue`          | method | Maps a method value as an XML element value. |
| `@YandexYmlXmlElementWrapper` | method | Maps a method value as an XML element contains another XML elements |
| `@YandexYmlXmlList`           | method | Maps a method value as container for XML elements which renders by itself in current element. |

