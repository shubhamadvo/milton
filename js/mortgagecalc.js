function Currency(anynum) {
   anynum = eval(anynum);
   workNum = Math.abs((Math.round(anynum*100)/100));
   workStr = "" + workNum;
   if (workStr.indexOf(".") == -1)
    workStr += ".00";
   dStr = workStr.substr(0,workStr.indexOf("."));
   dNum = dStr - 0;
   pStr = workStr.substr(workStr.indexOf("."));
   while (pStr.length < 3)
   {
    pStr += "0";
   }
   retval = dStr + pStr 
   return retval
}

function IsNumeric(strField)
{
  var i = 0;
  var onedec = false;
  for (i = 0; i < strField.length; i++)
  { if (strField.charAt(i)!="." && (strField.charAt(i) < '0' || strField.charAt(i) > '9'))
      return false;
    if (strField.charAt(i)==".")
    { if (onedec)
        return false;
      else
        onedec = true;
    }
  }
  return true;
}
function CheckForm(frm, type)
{
  frm.amount.value = frm.amount.value.replace(",","");
  frm.payments.value = frm.payments.value.replace(",","");
  
  if (!IsNumeric(frm.term.value) || Trim(frm.term.value)=="")
  { alert("Please enter a valid number for 'Length of Term'");
    frm.term.focus();
    frm.term.select();
    return false;   
  }
  if (!IsNumeric(frm.rate.value) || Trim(frm.rate.value)=="")
  { alert("Please enter a valid number for 'Interest Rate'");
    frm.rate.focus();
    frm.rate.select();
    return false;   
  }
  if (!IsNumeric(frm.amount.value))
  { alert("Please enter a valid number for 'Mortgage Amount'");
    frm.amount.focus();
    frm.amount.select();
    return false;   
  }
  if (!IsNumeric(frm.payments.value))
  { alert("Please enter a valid number for 'Monthly Payments'");
    frm.payments.focus();
    frm.payments.select();
    return false;   
  }
  if(type=="payment" && Trim(frm.amount.value)=="")
  { alert("Please enter an amount for 'Mortgage Amount' to calculate 'Monthly Payments'");
    frm.amount.focus();
    return false;
  }
  if(type=="amount" && Trim(frm.payments.value)=="")
  { alert("Please enter an amount for 'Monthly Payments' to calculate 'Mortgage Amount'");
    frm.payments.focus();
    return false;
  }
  return true;
}
function CalcMortgage(frm, type)
{
  if (CheckForm(frm, type))
  {
    var n = frm.term.value * 12;
    var r = frm.rate.value / 1200;
    var a = frm.amount.value;
    var p = frm.payments.value;
  
    if(type == "payment")
    { p = (a * (1200 * r) * Math.pow((1 + r),n)) / (1200 * (Math.pow((1 + r),n)-1));
      frm.payments.value= Currency(p);
    }
    else if(type == "amount")
    {
      a = (p / ((1200 * r) * Math.pow((1 + r),n)) * (1200 * (Math.pow((1 + r),n)-1)));
      frm.amount.value = Currency(a);
    }
  }
}
