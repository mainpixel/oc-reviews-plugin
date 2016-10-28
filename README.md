# oc-reviews-plugin
Reviews plugin for OctoberCMS, with admin management. The plugin comes with two components, list of reviews and a posting form for posting reviews.
The list component hold a few options. You can sort the list by date, the max amount items and a "not found" message.
The admin has to aprove the posted review, in the backend, before actualy seeing the review on the frontend.

**maxItems:** The amount of max shown items.
**sortOrder:** Sorting is done by date (asc or desc)
**notFoundMessage:** If there no results, the message that is displayed in the backend.

## Installation
Login to the backend and add the plugin to the page. Make sure that the code is added to the editor below, if not, add this
```
{% component 'reviews' %}
{% component 'reviewsform' %}
```

The plugin has two components, the review list and the review form component.
The list component shows a list of reviews that are submitted and apporoved by the admin.

The form component shows the form which is used to submit a review. Form validation is active!
