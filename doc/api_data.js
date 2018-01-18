define({ "api": [
  {
    "type": "get",
    "url": "/investor/booking/detail/{trip_no}/{driver_id}",
    "title": "Get details of booking",
    "name": "Booking_Detail",
    "group": "Drivers",
    "description": "<p>Returns a page with a details of booking</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "driver_id",
            "description": "<p>The drivers id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "trip_no",
            "description": "<p>The trip number</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<p>details of booking</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<ol start=\"404\"> <li></li> </ol>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  },
  {
    "type": "get",
    "url": "/investor/booking/{id}",
    "title": "Get drivers Booking and Missed",
    "name": "Booking_and_Missed",
    "group": "Drivers",
    "description": "<p>Returns a page with a booking and missed of driver</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>The drivers id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<p>Booking and Missed.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  },
  {
    "type": "get",
    "url": "/investor/complaints_filed/{id}",
    "title": "Get drivers Complaints Filed",
    "name": "Complaints_Filed",
    "group": "Drivers",
    "description": "<p>Returns a page with a complaints filed of driver</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>The drivers id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<p>Complaints Filed.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  },
  {
    "type": "get",
    "url": "/investor/{id}",
    "title": "Get drivers menu",
    "name": "Driver_Menu",
    "group": "Drivers",
    "description": "<p>Returns a page with a menu of driver</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>The drivers id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<p>Drivers menu.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<ol start=\"404\"> <li></li> </ol>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  },
  {
    "type": "get",
    "url": "/investor/menu",
    "title": "Get drivers list",
    "name": "Drivers_List",
    "group": "Drivers",
    "description": "<p>Returns a page with a list of drivers</p>",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<p>Drivers list.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  },
  {
    "type": "get",
    "url": "/investor/settings/{id}",
    "title": "Get drivers profile detail list",
    "name": "Drivers_Profile",
    "group": "Drivers",
    "description": "<p>Returns a page with a profile of driver</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>The drivers id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<p>Profile</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<ol start=\"404\"> <li></li> </ol>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  },
  {
    "type": "post",
    "url": "/send_message",
    "title": "Send Message",
    "name": "Send_Message",
    "group": "Drivers",
    "description": "<p>Send message from driver</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "driver_id",
            "description": "<p>The drivers id</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "content",
            "description": "<p>The message for send</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "value",
            "description": "<p>The value of parameter for change</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>The name of parameter for change</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "back",
            "optional": false,
            "field": "page",
            "description": "<p>Back to send page.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  },
  {
    "type": "get",
    "url": "/investor/statements/{id}",
    "title": "Get drivers Statements",
    "name": "Statements",
    "group": "Drivers",
    "description": "<p>Returns a page with a statements of driver</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>The drivers id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<p>Statements.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  },
  {
    "type": "get",
    "url": "/investor/wallets/{id}",
    "title": "Get drivers Wallets",
    "name": "Wallets",
    "group": "Drivers",
    "description": "<p>Returns a page with a wallets of driver</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "id",
            "description": "<p>The drivers id</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "page",
            "optional": false,
            "field": "page",
            "description": "<p>Wallets.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./app/Http/Controllers/DriverController.php",
    "groupTitle": "Drivers"
  }
] });
