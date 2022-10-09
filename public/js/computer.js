function update1() {
  var select = document.getElementById('intelCpu');
  var option = select.options[select.selectedIndex];

  document.getElementById('text1').value = option.text;
}
function update2() {
  var select = document.getElementById('amdCpu');
  var option = select.options[select.selectedIndex];

  document.getElementById('text2').value = option.text;
}
function update3() {
  var select = document.getElementById('intelMobo');
  var option = select.options[select.selectedIndex];

  document.getElementById('text3').value = option.text;
}
function update4() {
  var select = document.getElementById('amdMobo');
  var option = select.options[select.selectedIndex];

  document.getElementById('text4').value = option.text;
}
function update5() {
  var select = document.getElementById('intelGpu');
  var option = select.options[select.selectedIndex];

  document.getElementById('text5').value = option.text;
}
function update6() {
  var select = document.getElementById('amdGpu');
  var option = select.options[select.selectedIndex];

  document.getElementById('text6').value = option.text;
}
function update7() {
  var select = document.getElementById('nvidiaGpu');
  var option = select.options[select.selectedIndex];

  document.getElementById('text7').value = option.text;
}
function update8() {
  var select = document.getElementById('ram_');
  var option = select.options[select.selectedIndex];

  document.getElementById('text8').value = option.text;
}
function update9() {
  var select = document.getElementById('ssd_');
  var option = select.options[select.selectedIndex];

  document.getElementById('text9').value = option.text;
}
function update10() {
  var select = document.getElementById('psu_');
  var option = select.options[select.selectedIndex];

  document.getElementById('text10').value = option.text;
}
function update11() {
  var select = document.getElementById('casing_');
  var option = select.options[select.selectedIndex];

  document.getElementById('text11').value = option.text;
}
