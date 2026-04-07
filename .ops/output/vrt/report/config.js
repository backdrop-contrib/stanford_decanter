report({
  "testSuite": "BackstopJS",
  "tests": [
    {
      "pair": {
        "reference": "../approved/Home--desktop.png",
        "test": "../test/latest/Home--desktop.png",
        "selector": "document",
        "fileName": "Home--desktop.png",
        "label": "Home",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/",
        "expect": 0,
        "viewportLabel": "desktop",
        "diff": {
          "isSameDimensions": true,
          "dimensionDifference": {
            "width": 0,
            "height": 0
          },
          "rawMisMatchPercentage": 5.396556712962964,
          "misMatchPercentage": "5.40",
          "analysisTime": 143
        },
        "diffImage": "../test/latest/failed_diff_Home--desktop.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Home--mobile.png",
        "test": "../test/latest/Home--mobile.png",
        "selector": "document",
        "fileName": "Home--mobile.png",
        "label": "Home",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/",
        "expect": 0,
        "viewportLabel": "mobile",
        "diff": {
          "isSameDimensions": false,
          "dimensionDifference": {
            "width": 0,
            "height": -209
          },
          "rawMisMatchPercentage": 23.882608695652173,
          "misMatchPercentage": "23.88",
          "analysisTime": 100
        },
        "diffImage": "../test/latest/failed_diff_Home--mobile.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Menus--desktop.png",
        "test": "../test/latest/Menus--desktop.png",
        "selector": "document",
        "fileName": "Menus--desktop.png",
        "label": "Menus",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/menus",
        "expect": 0,
        "viewportLabel": "desktop",
        "diff": {
          "isSameDimensions": true,
          "dimensionDifference": {
            "width": 0,
            "height": 0
          },
          "rawMisMatchPercentage": 14.832706404320989,
          "misMatchPercentage": "14.83",
          "analysisTime": 159
        },
        "diffImage": "../test/latest/failed_diff_Menus--desktop.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Menus--mobile.png",
        "test": "../test/latest/Menus--mobile.png",
        "selector": "document",
        "fileName": "Menus--mobile.png",
        "label": "Menus",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/menus",
        "expect": 0,
        "viewportLabel": "mobile",
        "diff": {
          "isSameDimensions": false,
          "dimensionDifference": {
            "width": 0,
            "height": -229
          },
          "rawMisMatchPercentage": 12.56924257105943,
          "misMatchPercentage": "12.57",
          "analysisTime": 77
        },
        "diffImage": "../test/latest/failed_diff_Menus--mobile.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Blocks--desktop.png",
        "test": "../test/latest/Blocks--desktop.png",
        "selector": "document",
        "fileName": "Blocks--desktop.png",
        "label": "Blocks",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/blocks",
        "expect": 0,
        "viewportLabel": "desktop",
        "diff": {
          "isSameDimensions": false,
          "dimensionDifference": {
            "width": 0,
            "height": -1626
          },
          "rawMisMatchPercentage": 1.9528940317812267,
          "misMatchPercentage": "1.95",
          "analysisTime": 169
        },
        "diffImage": "../test/latest/failed_diff_Blocks--desktop.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Blocks--mobile.png",
        "test": "../test/latest/Blocks--mobile.png",
        "selector": "document",
        "fileName": "Blocks--mobile.png",
        "label": "Blocks",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/blocks",
        "expect": 0,
        "viewportLabel": "mobile",
        "diff": {
          "isSameDimensions": false,
          "dimensionDifference": {
            "width": 0,
            "height": -4397
          },
          "rawMisMatchPercentage": 2.666174929980972,
          "misMatchPercentage": "2.67",
          "analysisTime": 84
        },
        "diffImage": "../test/latest/failed_diff_Blocks--mobile.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Events--desktop.png",
        "test": "../test/latest/Events--desktop.png",
        "selector": "document",
        "fileName": "Events--desktop.png",
        "label": "Events",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/events",
        "expect": 0,
        "viewportLabel": "desktop",
        "error": "Reference file not found /output/approved/Events--desktop.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Events--mobile.png",
        "test": "../test/latest/Events--mobile.png",
        "selector": "document",
        "fileName": "Events--mobile.png",
        "label": "Events",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/events",
        "expect": 0,
        "viewportLabel": "mobile",
        "error": "Reference file not found /output/approved/Events--mobile.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Past_Events--desktop.png",
        "test": "../test/latest/Past_Events--desktop.png",
        "selector": "document",
        "fileName": "Past_Events--desktop.png",
        "label": "Past Events",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/events/past-events",
        "expect": 0,
        "viewportLabel": "desktop",
        "error": "Reference file not found /output/approved/Past_Events--desktop.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "../approved/Past_Events--mobile.png",
        "test": "../test/latest/Past_Events--mobile.png",
        "selector": "document",
        "fileName": "Past_Events--mobile.png",
        "label": "Past Events",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.5,
        "url": "http://app/events/past-events",
        "expect": 0,
        "viewportLabel": "mobile",
        "error": "Reference file not found /output/approved/Past_Events--mobile.png"
      },
      "status": "fail"
    }
  ]
});