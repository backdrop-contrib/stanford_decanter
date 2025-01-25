module.exports = async (page, scenario, viewport, isReference, browserContext) => {
  console.log(`----------------------------------
url: '${scenario.url}' 
label:  '${scenario.label}'`);
  
  // await require('./clickAndHoverHelper')(page, scenario);
};
