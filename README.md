# oc-reviews-plugin
Reviews plugin for OctoberCMS, with admin management. The plugin comes with two components, list of reviews and a posting form for posting reviews.

The list component hold a few options, that are shown below.
The form component hold the form for submiting a review. 

So it's possible to have the components seperated and on multiple pages.
The admin has to aprove the posted review, in the backend, before actualy seeing the review on the frontend.

All the styling is done with [Bootstrap](http://getbootstrap.com/getting-started/#download-cdn). Make sure that it is added to the page!

- **maxItems:** The amount of max shown items.
- **sortOrder:** Sorting is done by date (asc or desc)
- **notFoundMessage:** If there no results, the message that is displayed in the backend.

## Usage
Login to the backend and drag/add the plugin to the page. Make sure that the code is added to the editor below, if not, add this
```
{% component 'reviews' %}
{% component 'reviewsform' %}
```
Make sure to add the
```
{% scripts %}
```
tag to the page aswell, otherwise the CSS, that comes with the plugin, will not be loaded.

## Customize
It is possible to customize the form aswell as the view list. 
Drag/add the component to the page, click on the white "component" text and the template will appear in the editor. 

### List Template
``` HTML
{%  set reviews = __SELF__.reviews %}

<div class="col-md-6">
	{% for review in reviews %}
	{% if review.published == 1 %}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				#{{ review.id }} - {{ review.title }}
				<span class="pull-right">{{ review.created_at }}</span>
			</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-9">
					<table>
						<tbody>
						<tr>
							<td><b>{{ review.title }} - {{ review.email }}</b></td>
							<td></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><div class="more">{{ review.review|raw }}</div></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-3" align="center">
					<img alt="{{ review.title }}" src="{{ review.image.thumb(150, 150, {'mode':'crop'}) }}" class="img-thumbnail img-responsive">
				</div>
			</div>
		</div>
	</div>
	{% endif %}
	{% endfor %}
</div>
```
