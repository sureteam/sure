  function numberFormat(nr)
        {
            //remove the existing
            var regex = /,/g;
            nr        = nr.replace(regex,'');

            //split it into 2 parts
            var x   = nr.split(',');
            var p1  = x[0];
            var p2  = x.length > 1 ? ',' + x[1] : '';
            //match group of 3 numbers (0-9) and add ',' between them
            regex   = /(\d+)(\d{3})/;
            while(regex.test(p1))
            {
                p1 = p1.replace(regex, '$1' + ',' + '$2');
            }
            //join the 2 parts and return the formatted number
            return p1 + p2;
        }