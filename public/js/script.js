export function get_csrf(){
  return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}
export function valdiate_value(value, item) {
  let errorMessage = "";
  if (eval(item.valid_formula1)) {
    errorMessage = item.error1;
  } else if (eval(item.valid_formula2)){
    errorMessage = item.error2;
  } else if (eval(item.valid_formula3)){
    errorMessage = item.error3;
  } else if (eval(item.valid_formula4)){
    errorMessage = item.error4;
  } else if (eval(item.valid_formula5)){
    errorMessage = item.error5;
  }
  return errorMessage;
}

export function extract_error_message(errors, item){
  let errorMessage = (errors && errors[item.name]) ? errors[item.name][0] : "";
  return errorMessage;
}

export function select_def_value(old, item){
  let def_value = old;
  def_value = def_value[item.name];
  def_value = (def_value !== undefined)? def_value: eval(item.value_formula);
  return def_value;
}