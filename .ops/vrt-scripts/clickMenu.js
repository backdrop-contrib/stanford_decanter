module.exports = async (page, scenario) => {
  const toggle = await page.waitForSelector('.menu-toggle-button', {state: 'attached', timeout: 3000});
  if (toggle && await toggle.isVisible()) {
    await page.click('.menu-toggle-button');
    await page.click('.l-header .block-system-main-menu .has-submenu');
    await page.click('a[href*="menus/long"]');
    await page.waitForTimeout(1000);
  }

  const hover = await page.waitForSelector('a[href*="menus"]', {state: 'attached', timeout: 3000});
  if (hover && await hover.isVisible()) {
    await page.hover('a[href*="menus"]');
    // #TODO: The playwrite hover does not trigger the menu js.
    // await page.hover('a[href*="menus/long"]');
    // await page.waitForTimeout(10000);
  }
};
