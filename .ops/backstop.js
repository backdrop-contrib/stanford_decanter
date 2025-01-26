module.exports = {
    "viewports": [
      {
        "label": "desktop",
        "width": 1920,
        "height": 1080
      },
      {
        "label": "mobile",
        "width": 360,
        "height": 800
      }
    ],
    "paths": {
      "engine_scripts":     "/scripts",
      "html_report":        "/output/report",
      "bitmaps_reference":  "/output/approved",
      "bitmaps_test":       "/output/test",
    },
    "report": ["browser","json"],
    "engine": "playwright",
    "onReadyScript": "onReady.js",
    "engineOptions": {
      "browser": "chromium"
    },
    "misMatchThreshold": 0.5,
    "asyncCaptureLimit": 1,
    "asyncCompareLimit": 10,
    "resembleOutputOptions": {
      "ignoreAntialiasing": true,
      "usePreciseMatching": true
    },
    "debug": false,
    "debugWindow": false,
    "scenarioLogsInReports": true,
    "fileNameTemplate": '{scenarioLabel}--{viewportLabel}',
    "scenarios": [
      {
        "label": "Mobile Menu",
        "url":  "http://app/",
        "viewports": [
          {
            "label": "mobile",
            "width": 360,
            "height": 800
          }
        ],
        // "clickSelector": ".menu-toggle-button",
        "postInteractionWait": 1000,
        "clickSelectors": [
            ".l-header .menu-toggle-button",
            ".l-header .has-children"
        ]
      }
    ],
  }
  
  try {
    require('fs')
      .readFileSync('/urls.txt', 'utf-8')
      .split(/\n/)
      .forEach((url) => {
                  module.exports.scenarios.push(
                    {
                      "label":  url.split(/\s+/).pop().trim(),
                      "url":    `http://app${url.split(/\s+/)[0]}`,
                    }
                  );
                });
  } catch (err) {
    console.log(err);
  }