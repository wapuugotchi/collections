# WappuuGotchi Collection

This API provides the wapuu collection for the wapuugotchi plugin. They can be found [here](https://api.wapuugotchi.com/collection/).
The schema can be found [here](https://api.wapuugotchi.com/schema/collection/).

## Element structure

The different parts are structured in folders e.g. the balls are placed under `/_balls`.
Each element is placed in its own folder and needs a `image.svg`, `preview.png` and a `meta.md` file.

The folder name needs to be written in **snake case**.

The `meta.md` is written like this:
```md
---
slug: classic
name: Classic
key: b5fb043f-76c6-41aa-9f3a-47bc445f52b7 (randomly generated)
---
```

Other optional values are:

* author: the author of the element
* description: the description for the element
* published: the publishing date of the element
* licsense: the license of the element
* price: the needed coins for unlocking the element (default: 0)

Scanned folders are:

* `_balls` for ball elements
* `_coats` for coat elements
* `_caps` for cap elements
* `_fur` for fur elements
* `_items` for item elements
* `_shoes` for shoe elemeps

## Adding new items

To add a new element, just create a new folder in the corresponding folder and add the needed files.
After that, create a pull request and wait for it to be merged.

The svg needs to follow this structure:

```svg
<svg id="wapuugotchi_svg__wapuu" width="200" version="1.1" viewBox="0 0 1e3 1e3" xmlns="http://www.w3.org/2000/svg">
	<g id="RightArm--group">
	</g>
	<g id="Tail--group">
	</g>
	<g id="Body--group">
	</g>
	<g id="RightHand--group">
	</g>
	<g id="RightFoot--group">
	</g>
	<g id="RightEar--group">
	</g>
	<g id="Head--group">
	</g>
	<g id="LeftEar--group">
	</g>
	<g id="Face--group">
	</g>
	<g id="LeftLeg--group">
	</g>
	<g id="LeftFoot--group">
	</g>
	<g id="LeftArm--group">
	</g>
</svg>
```

Groups which are not needed can be removed but groups which have to be on a specific layer need to be kept even without content.

