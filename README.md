# oc-reviews-plugin
Reviews plugin for OctoberCMS, with admin management. The plugin comes with two components, list of reviews and a posting form for posting reviews.

The list component hold a few options, that are shown below.
The form component hold the form for submiting a review. 

So it's possible to have the components seperated and on multiple pages.
The admin has to aprove the posted review, in the backend, before actualy seeing the review on the frontend.


- **maxItems:** The amount of max shown items.
- **sortOrder:** Sorting is done by date (asc or desc)
- **notFoundMessage:** If there no results, the message that is displayed in the backend.


## Requirements
All the styling is done with [Bootstrap](http://getbootstrap.com/getting-started/#download-cdn). Make sure that it is added to the page!

Make sure to add the
```
{% scripts %}
```
tag to the page aswell, otherwise the CSS, that comes with the plugin, will not be loaded.


## Usage
Login to the backend and drag/add the plugin to the page. Make sure that the code is added to the editor below, if not, add this
```
{% component 'reviews' %}
{% component 'reviewsform' %}
```

## Customize
It is possible to customize the form aswell as the view list. 
Drag/add the component to the page, click on the white "component" text and the template will appear in the editor. 
