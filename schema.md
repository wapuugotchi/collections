---
layout: default
title: Schema
meta: [name,author,description,published,license]
---
```json
{
    "$id": "https://api.wapuugotchi.com/schema/collection",
    "$schema": "https://json-schema.org/draft/2020-12/schema",
    "additionalProperties": false,
    "type": "object",
    "$defs": {
        "https://api.wapuugotchi.com/schema/element": {
            "$id": "https://api.wapuugotchi.com/schema/element",
            "type": "object",
            "properties": {
                "meta": {
                    "type": "object",
                    "properties": {
                        {% for var in page.meta %}"{{ var }}": {
                            "type": "string"
                        },
                        {% endfor %}"price": {
                            "type": "number"
                        }
                    },
                    "required": [
                    {% for var in page.meta %}"{{ var }}",{% endfor %}
                    "price"
                    ]
                },
                "image": {
                    "type": "string"
                },
                "preview": {
                    "type": "string"
                }
            },
            "required": [
            "meta",
            "image",
            "preview"
            ]
        }
    },
    "properties": {
        {% for collection in site.collections %}{% unless collection.label == "posts" or collection.label == "assets" %}"{{ collection.label }}":{
            "type": "object",
            "patternProperties": {
                "^[a-z].*": {
                    "type": "object",
                    "$ref": "/schema/element"
                }
            }
        }{% unless forloop.last %},{% endunless %}
        {% endunless %}{% endfor %}
    }
}
```