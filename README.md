Laboratory Activity 6 - Two Filters, One Route

1. I did not add a new route for the second filter because the filters use query strings. The router only looks at the URL path, so both the genre and year filters can use the same /books route. This also lets me use one filter or both filters at the same time.

2. If I used route parameters instead, the filter value would be part of the URL path. For example, a year-only filter could look like /books/year/1861. If I also wanted to filter by genre, I would need another route pattern for it. This is why query strings are used for the filters in this activity.

3. The navigation link on the detail page still works because it uses the existing book route. The filter links also use the same /books route and only add the filter values to the URL. Because of this, I did not need to add another route for the filters.

4. I deleted the old filter method because the filtering is now handled inside the index method. The store and update methods were kept even though they do not have routes. They are still empty methods in the controller, while the old filter method was no longer needed.
