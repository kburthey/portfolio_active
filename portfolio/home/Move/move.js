var main = function() {
  var cities = [
    "Raleigh",
    "Durham",
    "Chapel Hill",
    "Charlotte",
    "Asheville",
  ];
  $("#auto").autocomplete({
    source: cities
  });
};
 
$(document).ready(main);