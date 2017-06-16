---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://app.fluxdev.nl/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_bb4aba656f27b0d9612228750b56a024 -->
## Get the last data from DB from a certain time to the end

> Example request:

```bash
curl -X GET "http://app.fluxdev.nl/api/lastData/{hour}/{minute}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://app.fluxdev.nl/api/lastData/{hour}/{minute}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/lastData/{hour}/{minute}`

`HEAD api/lastData/{hour}/{minute}`


<!-- END_bb4aba656f27b0d9612228750b56a024 -->

<!-- START_7d53e4f6398291d7dc2392ba089af683 -->
## Compare two data and return intersecting times

> Example request:

```bash
curl -X GET "http://app.fluxdev.nl/api/intersectData/{hour1}/{minute1}/{hour2}/{minute2}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://app.fluxdev.nl/api/intersectData/{hour1}/{minute1}/{hour2}/{minute2}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/intersectData/{hour1}/{minute1}/{hour2}/{minute2}`

`HEAD api/intersectData/{hour1}/{minute1}/{hour2}/{minute2}`


<!-- END_7d53e4f6398291d7dc2392ba089af683 -->

<!-- START_b77feb7ab94b9ffa9d8bc2de889f6900 -->
## api/data/{hour1}/{minute1}/{hour2}/{minute2}/{hourIntersect}/{minuteIntersect}

> Example request:

```bash
curl -X GET "http://app.fluxdev.nl/api/data/{hour1}/{minute1}/{hour2}/{minute2}/{hourIntersect}/{minuteIntersect}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://app.fluxdev.nl/api/data/{hour1}/{minute1}/{hour2}/{minute2}/{hourIntersect}/{minuteIntersect}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/data/{hour1}/{minute1}/{hour2}/{minute2}/{hourIntersect}/{minuteIntersect}`

`HEAD api/data/{hour1}/{minute1}/{hour2}/{minute2}/{hourIntersect}/{minuteIntersect}`


<!-- END_b77feb7ab94b9ffa9d8bc2de889f6900 -->

