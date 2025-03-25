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
    "onReadyScript": "",
    "scenarios": [],
    readyTimeout: 3,
  }
  
  try {
    require('fs')
      .readFileSync('/urls.txt', 'utf-8')
      .split(/\n/)
      .forEach((line) => {
          parts = line.split(',').map(str => str.trim());
          if (!parts || parts[0]?.startsWith('#') || !parts?.[1])
            return;

          scenario = {
                "label":          parts[0],
                "url":           `http://app${parts[1]}`,
                "onReadyScript":  parts[2] || "onReady.js"
              };
          module.exports.scenarios.push(scenario);
        });
  } catch (err) {
    console.log(err);
  }

//          // module.exports.scenarios.push(scenario);

  // module.exports.scenarios.push(
  //   {
  //     "label":          parts[0].trim(),
  //     "url":           `http://app${parts[1]}`,
  //   }
  // );
