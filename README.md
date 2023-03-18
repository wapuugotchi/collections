---
layout: default
title: Wapuugotchi collection
permalink: index.html
---
# Wappuugotchi Collection

This API provides the wapuu collection for the wapuugotchi plugin. They can be found [here](https://api.wapuugotchi.com/collection.json).

## File tree

The different parts are structured in folders e.g. the balls are placed under `/_balls`.
Each element is placed in its own folder and needs a `image.svg`, `preview.png` and a `meta.md` file.

The folder name needs to be written in **snake case**.

The `meta.md` is written like this:
```
---
slug: classic
name: Classic
---
```

Other optional values are:

* author: the author of the eleentU
* description: the description for the element
* published: the publishing date of the element
* licsense: the license of the element