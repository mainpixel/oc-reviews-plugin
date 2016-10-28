# oc-reviews-plugin
Reviews plugin for OctoberCMS, with admin management. The plugin comes with two components, list of reviews and a posting form for posting reviews.

The list component hold a few options, that are shown below.
The form component hold the form for submiting a review. 

So it's possible to have the components seperated and on multiple pages.
<<<<<<< HEAD
The admin must approve the posted review in the backend, before actualy it on the frontend.
=======
The admin has to aprove the posted review, in the backend, before actualy seeing the review on the frontend.
>>>>>>> 72e4cea1dde63fc9077944fc23fd89499d6f6795


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

<<<<<<< HEAD
If you'r not seeing the review after a post. Make sure to approve the review when logged in at the backend.

## Customize
It is possible to customize the form aswell as the view list. 
Drag/add the component to the page, click on the white "component" text and the template will appear in the editor. 


### TODO List
- Add confirm message
- Add random function for sorting view
- Add Bootstrap to default plugin load
- Change the default upload folder to custom upload folder.
- Add Dutch language support
=======
## Customize
It is possible to customize the form aswell as the view list. 
Drag/add the component to the page, click on the white "component" text and the template will appear in the editor. 
>>>>>>> 72e4cea1dde63fc9077944fc23fd89499d6f6795
