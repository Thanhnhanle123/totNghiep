$('.checkbox_main').on('click',function(){
    $(this).parents('.card').find('.checkbox_children').prop('checked',$(this).prop('checked'));
});

$('.check_all').on('click',function(){
    $(this).parents().find('.checkbox_children').prop('checked',$(this).prop('checked'));
    $(this).parents().find('.checkbox_main').prop('checked',$(this).prop('checked'));
});
