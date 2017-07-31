/**
 * Created by Miorantsoa on 30/07/2017.
 */
function isRangeValid(begin_date,end_date){
    begin = new Date(begin_date);
    end  = new Date(end_date);
    return begin.getTime() <= end.getTime();
}



