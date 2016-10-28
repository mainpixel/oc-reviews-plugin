# oc-reviews-plugin
Reviews plugin for OctoberCMS, with admin management.

### Installation
Login to the backend and add the plugin to the page. Make sure that the code is added to the editor below, if not, add this
```
{% component 'reviews' %}
{% component 'reviewsform' %}
```

The plugin has two components, the review list and the review form component.
The list component shows a list of reviews that are submitted and apporoved by the admin.

The form component shows the form which is used to submit a review. Form validation is active!
