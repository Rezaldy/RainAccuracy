$(document).ready(function(){
    $('.possibleTimes').on('click', '.possibleTime', function(){
        $('.possibleTime.selected').removeClass("selected");
        $(this).addClass("selected");
    });
    
    $('.predictionFirst').change(function(){
        $('.comparisons, .result').slideUp();
        $('.possibleTimes').slideUp(null, null, function(){
            $('.timeBlock').remove();
        });
        
        var time = $(this).val();
        var timeParts = time.split(':');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        
        $.ajax({
            type: "GET",
            url: "/api/lastData/" + timeParts[0] + "/" + timeParts[1],
            success: function(data){
                
                if ($('.compareTo').is(':visible')) {
                    $('.compareTo').stop().fadeOut(null, null, function(){
                        $('.predictionSecond').prop('selectedIndex', 0);
                        $.when(
                        $('.predictionSecond > option').filter(function() {
                            return this.value || $.trim(this.value).length != 0;
                        })
                       .remove()).then(
                            $.each(data, function(index, dataLine){
                                var splitTime = dataLine.split(":");
                                var time = splitTime[0] + ":" + splitTime[1];
                                //console.log(time);
                                $('.predictionSecond').append("<option value='" + time +"'>"+ time +"</option>");
                            })
                        );
                    });
                } else {
                    $.each(data, function(index, dataLine){
                        var splitTime = dataLine.split(":");
                        var time = splitTime[0] + ":" + splitTime[1];
                        //console.log(time);
                        $('.predictionSecond').append("<option value='" + time +"'>"+ time +"</option>");
                    });
                }
                
                $('.compareTo').fadeIn();
            },
        });
    });
    
    $('.predictionSecond').change(function(){
        
        $('.comparisons, .result').slideUp();
        
        var timeFirst = $('.predictionFirst').val();
        var timePartsFirst = timeFirst.split(':');
        var timeSecond = $(this).val();
        var timePartsSecond = timeSecond.split(':');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        
        $.ajax({
            type: "GET",
            url: "/api/intersectData/" + timePartsFirst[0] + "/" + timePartsFirst[1] + "/" + timePartsSecond[0] + "/" + timePartsSecond[1] + "/",
            success: function(data){
                
                if ($('.possibleTimes').is(':visible')) {
                    $('.possibleTimes').stop().slideUp(null, null, function(){
                        $('.timeBlock').remove();
                        $.each(data, function(index, dataLine){
                            $('.timeRow').append("<div class='col-md-1 col-xs-4 timeBlock'><label class='possibleTime'><input type='radio' value='" + dataLine.time + "' name='possibleTime'>" + dataLine.time + "</label></div>");
                        });
                    });
                } else {
                    $.each(data, function(index, dataLine){
                        $('.timeRow').append("<div class='col-md-1 col-xs-4 timeBlock'><label class='possibleTime'><input type='radio' value='" + dataLine.time + "' name='possibleTime'>" + dataLine.time + "</label></div>");
                    });
                }
                
                $('.possibleTimes').slideDown();
            }
        });
    });
    
    $('.possibleTimes').on('click','.possibleTime > input',function(){
        
        var timeFirst = $('.predictionFirst').val();
        var timePartsFirst = timeFirst.split(':');
        var timeSecond = $('.predictionSecond').val();
        var timePartsSecond = timeSecond.split(':');
        var timeIntersect = $(this).val();
        var timePartsIntersect = timeIntersect.split(':');
        

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        
        $.ajax({
            type: "GET",
            url: "/api/data/" + timePartsFirst[0] + "/" + timePartsFirst[1] + "/" + timePartsSecond[0] + "/" + timePartsSecond[1] + "/" + timePartsIntersect[0] + "/" + timePartsIntersect[1] + "/",
            success: function(data){
                if ($('.comparisons, .result').is(':visible')) {
                    $('.comparisons, .result').stop().slideUp(null, null, function(){
                        // Set the time
                            $('.compareFrom > h2 > strong').text(timeFirst);
                            $('.compareFrom > h2 > strong').text(timeSecond);
                        // Set the rain value xxx/255 from data["early/late"]["rainAmount"];
                            $('.compareFrom .rainFrom > .rainValue').text("(" + data.early.rainAmount + "/255)");
                            $('.compareTo .rainTo > .rainValue').text("(" + data.late.rainAmount + "/255)");
                        // Set the rain chance percentage
                            $('.compareFrom .rainFrom > h3').text((data.early.rainAmount/255 * 100) + "%");
                            $('.compareTo .rainTo > h3').text((data.late.rainAmount/255 * 100) + "%");
                        // Calculate how much higher/lower the late value was compared to early value
                            var highlow;
                            
                            if (data.early.rainAmount > data.late.rainAmount) {
                                if (data.early.rainAmount > 0) {
                                    highlow = "~" + (((data.late.rainAmount - data.early.rainAmount) / data.early.rainAmount) * 100) + "% lower";   // How much lower?
                                } else {
                                    highlow = "~" + (((data.late.rainAmount - data.early.rainAmount) / 1) * 100) + "% lower";                       // How much lower? Early value is 0
                                }
                            } else {
                                if (data.late.rainAmount > 0) {
                                    highlow = "~" + (((data.early.rainAmount - data.late.rainAmount) / data.late.rainAmount) * 100) + "% higher";   // How much higher?
                                } else {
                                    highlow = "~" + (((data.early.rainAmount - data.late.rainAmount) / 1) * 100) + "% higher";                      // How much higher? Late value is 0
                                }
                            }
                        // Set the result in .result
                            $('.result strong').text(highlow);
                    });
                } else {
                    // Set the time
                        $('.compareFrom > h2 > strong').text(timeFirst);
                        $('.compareTo > h2 > strong').text(timeSecond);
                    // Set the rain value xxx/255 from data["early/late"]["rainAmount"];
                        $('.compareFrom .rainFrom > .rainValue').text("(" + data.early.rainAmount + "/255)");
                        $('.compareTo .rainTo > .rainValue').text("(" + data.late.rainAmount + "/255)");
                    // Set the rain chance percentage
                        $('.compareFrom .rainFrom > h3').text((data.early.rainAmount/255 * 100) + "%");
                        $('.compareTo .rainTo > h3').text((data.late.rainAmount/255 * 100) + "%");
                    // Calculate how much higher/lower the late value was compared to early value
                        var highlow;
                        
                        if (data.early.rainAmount > data.late.rainAmount) {
                            if (data.early.rainAmount > 0) {
                                highlow = "~" + (((data.late.rainAmount - data.early.rainAmount) / data.early.rainAmount) * 100) + "% lower";   // How much lower?
                            } else {
                                console.log("Early 0");
                                highlow = "~" + (((data.late.rainAmount - data.early.rainAmount) / 1) * 100) + "% lower";                       // How much lower? Early amount is 0
                            }
                        } else {
                            if (data.late.rainAmount > 0) {
                                highlow = "~" + (((data.early.rainAmount - data.late.rainAmount) / data.late.rainAmount) * 100) + "% higher";   // How much higher?
                            } else {
                                console.log("Late 0");
                                highlow = "~" + (((data.early.rainAmount - data.late.rainAmount) / 1) * 100) + "% higher";                      // How much higher? Late amount is 0
                            }
                        }
                        
                    // Set the result in .result
                        $('.result strong').text(highlow);
                }
                
                $('.comparisons, .result').slideDown();
            },
        });
    });
});