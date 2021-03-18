$(document).ready(function () {

    function load_json_data(id, parent_id) {
        var html_code = '';
        $.getJSON('js/analysis.json', function (data) {

            html_code += '<option value="">Select ' + id + '</option>';
            $.each(data, function (key, value) {
                if (id == 'analysis') {
                    if (value.parent_id == '0') {
                        html_code += '<option value="' + value.id + '">' + value.analysis + '</option>';
                    }
                }
                else {
                    if (value.parent_id == parent_id) {
                        html_code += '<option value="' + value.id + '">' + value.analysis + '</option>';
                    }
                }
            });
            $('#' + id).html(html_code);
        });
    }
    load_json_data('analysis');
    $(document).on('change', '#analysis', function () {
        var analysis_id = $(this).val();
        
        if (analysis_id != '') {
            load_json_data('sub-analysis', analysis_id);
        }
        else {
            $('#sub-analysis').html('<option value="">Select sub analysis</option>');
        }
    });
});

