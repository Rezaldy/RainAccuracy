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
[
	"12:50:00",
	"12:55:00",
	"13:00:00",
	"13:05:00",
	"13:10:00",
	"13:20:00",
	"13:25:00",
	"13:30:00",
	"13:35:00",
	"13:40:00",
	"13:45:00",
	"13:50:00",
	"13:55:00",
	"14:00:00",
	"14:05:00",
	"14:10:00",
	"14:15:00",
	"14:25:00",
	"14:35:00",
	"14:40:00",
	"14:45:00",
	"14:50:00",
	"14:55:00",
	"15:00:00",
	"15:05:00",
	"15:10:00",
	"15:15:00",
	"15:30:00",
	"15:35:00",
	"15:55:00",
	"16:05:00",
	"16:15:00",
	"16:25:00",
	"16:30:00",
	"16:40:00",
	"16:45:00"
]
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
{
	14:00: {
		rainAmount: "000",
		time: "14:00"
	},
	14:05: {
		rainAmount: "000",
		time: "14:05"
	},
	14:10: {
		rainAmount: "000",
		time: "14:10"
	},
	14:15: {
		rainAmount: "000",
		time: "14:15"
	},
	14:20: {
		rainAmount: "000",
		time: "14:20"
	},
	14:25: {
		rainAmount: "000",
		time: "14:25"
	},
	14:30: {
		rainAmount: "000",
		time: "14:30"
	},
	14:35: {
		rainAmount: "000",
		time: "14:35"
	},
	14:40: {
		rainAmount: "000",
		time: "14:40"
	},
	14:45: {
		rainAmount: "000",
		time: "14:45"
	}
}
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
{
        early: {
                rainAmount: "000",
                time: "13:00"
        },
        late: {
                rainAmount: "000",
                time: "13:00"
        }
}
```

### HTTP Request
`GET api/data/{hour1}/{minute1}/{hour2}/{minute2}/{hourIntersect}/{minuteIntersect}`

`HEAD api/data/{hour1}/{minute1}/{hour2}/{minute2}/{hourIntersect}/{minuteIntersect}`


<!-- END_b77feb7ab94b9ffa9d8bc2de889f6900 -->

