module.exports = async (page, scenario) => {

  // Desktop: Top Level menu link is visible
  // const menu = await page.waitForSelector('a[href*="menus"]', {state: 'attached', timeout: 3000});
  // if (menu && await menu.isVisible()) {
  //   await menu.hover(); 
  //   await menu.dispatchEvent('mousemove')
  //   // #TODO: The playwrite hover does not trigger the menu js.
  //   // await page.hover('a[href*="menus/long"]');
  //   await page.waitForTimeout(10000);
  // }

  // Mobile: Menu toggle is visible
  const toggle = await page.waitForSelector('.menu-toggle-button', {state: 'attached', timeout: 3000});
  if (toggle && await toggle.isVisible()) {
    await toggle.click();
    await page.click('a[href="/menus"]');
    await page.click('a[href="/menus/long"]');
    await page.waitForTimeout(1000);
  }
};
