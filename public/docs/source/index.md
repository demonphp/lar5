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

# Info

Welcome to the generated API reference.
[Get Postman Collection](public/docs/collection.json)

# Available routes
#general
## admin/manager/admin/list

> Example request:

```bash
curl "http://localhost/admin/manager/admin/list" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/admin/list",
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
`GET admin/manager/admin/list`

`HEAD admin/manager/admin/list`

`POST admin/manager/admin/list`

`PUT admin/manager/admin/list`

`PATCH admin/manager/admin/list`

`DELETE admin/manager/admin/list`


## admin/manager/admin/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/manager/admin/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/admin/edit/{id}",
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
`GET admin/manager/admin/edit/{id}`

`HEAD admin/manager/admin/edit/{id}`

`POST admin/manager/admin/edit/{id}`

`PUT admin/manager/admin/edit/{id}`

`PATCH admin/manager/admin/edit/{id}`

`DELETE admin/manager/admin/edit/{id}`


## admin/manager/admin/save

> Example request:

```bash
curl "http://localhost/admin/manager/admin/save" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/admin/save",
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
    "message": "\u82f1\u6587\u540d \u4e0d\u80fd\u4e3a\u7a7a",
    "statusCode": 300
}
```

### HTTP Request
`GET admin/manager/admin/save`

`HEAD admin/manager/admin/save`

`POST admin/manager/admin/save`

`PUT admin/manager/admin/save`

`PATCH admin/manager/admin/save`

`DELETE admin/manager/admin/save`


## admin/manager/admin/accr-edit/{id}

> Example request:

```bash
curl "http://localhost/admin/manager/admin/accr-edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/admin/accr-edit/{id}",
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
`GET admin/manager/admin/accr-edit/{id}`

`HEAD admin/manager/admin/accr-edit/{id}`

`POST admin/manager/admin/accr-edit/{id}`

`PUT admin/manager/admin/accr-edit/{id}`

`PATCH admin/manager/admin/accr-edit/{id}`

`DELETE admin/manager/admin/accr-edit/{id}`


## admin/manager/admin/accr-save

> Example request:

```bash
curl "http://localhost/admin/manager/admin/accr-save" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/admin/accr-save",
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
    "message": "\u6388\u6743\u7528\u6237\u4e0d\u80fd\u4e3a\u7a7a \u4e0d\u80fd\u4e3a\u7a7a",
    "statusCode": 300
}
```

### HTTP Request
`GET admin/manager/admin/accr-save`

`HEAD admin/manager/admin/accr-save`

`POST admin/manager/admin/accr-save`

`PUT admin/manager/admin/accr-save`

`PATCH admin/manager/admin/accr-save`

`DELETE admin/manager/admin/accr-save`


## admin/manager/role/list

> Example request:

```bash
curl "http://localhost/admin/manager/role/list" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/role/list",
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
`GET admin/manager/role/list`

`HEAD admin/manager/role/list`

`POST admin/manager/role/list`

`PUT admin/manager/role/list`

`PATCH admin/manager/role/list`

`DELETE admin/manager/role/list`


## admin/manager/role/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/manager/role/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/role/edit/{id}",
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
`GET admin/manager/role/edit/{id}`

`HEAD admin/manager/role/edit/{id}`

`POST admin/manager/role/edit/{id}`

`PUT admin/manager/role/edit/{id}`

`PATCH admin/manager/role/edit/{id}`

`DELETE admin/manager/role/edit/{id}`


## admin/manager/role/save

> Example request:

```bash
curl "http://localhost/admin/manager/role/save" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/role/save",
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
    "message": "\u89d2\u8272\u82f1\u6587\u540d \u4e0d\u80fd\u4e3a\u7a7a",
    "statusCode": 300
}
```

### HTTP Request
`GET admin/manager/role/save`

`HEAD admin/manager/role/save`

`POST admin/manager/role/save`

`PUT admin/manager/role/save`

`PATCH admin/manager/role/save`

`DELETE admin/manager/role/save`


## admin/manager/role/accr-edit/{id}

> Example request:

```bash
curl "http://localhost/admin/manager/role/accr-edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/role/accr-edit/{id}",
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
`GET admin/manager/role/accr-edit/{id}`

`HEAD admin/manager/role/accr-edit/{id}`

`POST admin/manager/role/accr-edit/{id}`

`PUT admin/manager/role/accr-edit/{id}`

`PATCH admin/manager/role/accr-edit/{id}`

`DELETE admin/manager/role/accr-edit/{id}`


## admin/manager/role/accr-save

> Example request:

```bash
curl "http://localhost/admin/manager/role/accr-save" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/role/accr-save",
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
`GET admin/manager/role/accr-save`

`HEAD admin/manager/role/accr-save`

`POST admin/manager/role/accr-save`

`PUT admin/manager/role/accr-save`

`PATCH admin/manager/role/accr-save`

`DELETE admin/manager/role/accr-save`


## admin/manager/permission/list

> Example request:

```bash
curl "http://localhost/admin/manager/permission/list" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/permission/list",
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
`GET admin/manager/permission/list`

`HEAD admin/manager/permission/list`

`POST admin/manager/permission/list`

`PUT admin/manager/permission/list`

`PATCH admin/manager/permission/list`

`DELETE admin/manager/permission/list`


## admin/manager/permission/edit/{id}

> Example request:

```bash
curl "http://localhost/admin/manager/permission/edit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/permission/edit/{id}",
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
`GET admin/manager/permission/edit/{id}`

`HEAD admin/manager/permission/edit/{id}`

`POST admin/manager/permission/edit/{id}`

`PUT admin/manager/permission/edit/{id}`

`PATCH admin/manager/permission/edit/{id}`

`DELETE admin/manager/permission/edit/{id}`


## admin/manager/permission/save

> Example request:

```bash
curl "http://localhost/admin/manager/permission/save" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/admin/manager/permission/save",
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
    "message": "\u82f1\u6587\u540d \u4e0d\u80fd\u4e3a\u7a7a",
    "statusCode": 300
}
```

### HTTP Request
`GET admin/manager/permission/save`

`HEAD admin/manager/permission/save`

`POST admin/manager/permission/save`

`PUT admin/manager/permission/save`

`PATCH admin/manager/permission/save`

`DELETE admin/manager/permission/save`


