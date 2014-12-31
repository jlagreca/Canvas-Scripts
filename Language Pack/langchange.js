

// P tags

$('p').each(function() {
    var text = $(this).text();
    $(this).text(text.replace('Calendar', 'Time Thing')); 
  //  $(this).text(text.replace('Courses', 'Subjects')); 
  //  $(this).text(text.replace('Grades', 'Marks')); 
});

$('p').each(function() {
    var text = $(this).text();
    $(this).text(text.replace('Grades', 'Marks')); 
  //  $(this).text(text.replace('Courses', 'Subjects')); 
  //  $(this).text(text.replace('Grades', 'Marks')); 
});

$('p').each(function() {
    var text = $(this).text();
    $(this).text(text.replace('Courses', 'Subjects')); 
  //  $(this).text(text.replace('Courses', 'Subjects')); 
  //  $(this).text(text.replace('Grades', 'Marks')); 
});



// Menu Items

$('.menu-item__text').each(function() {
    var text = $(this).text();
    $(this).text(text.replace('Calendar', 'Time Thing')); 

});


$('.menu-item__text').each(function() {
    var text = $(this).text();
    $(this).text(text.replace('Grades', 'Marks')); 

});


$('.menu-item__text').each(function() {
    var text = $(this).text();
    $(this).text(text.replace('Courses', 'Subjects')); 

});

// Specifics

$('.grading_standards').each(function() {
    var text = $(this).text();
    $(this).text(text.replace('Grading Schemes', 'Marking Schemes')); 

});