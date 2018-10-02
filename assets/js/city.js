var ganged={
  data:  [
      {name:'黑龙江',cities:[
          {name:'哈尔滨',code:'0451'},
          {name:'牡丹江',code:'0459'}
      ]},
      {name:'北京',cities:[
              {name:'海淀',code:'1111'},
              {name:'西城',code:'2222'}
          ]}],
    init:function (opts) {
        var oProvince=document.querySelector(opts.provinceSelector);
        var oCity=document.querySelector(opts.citySelector);
        for(var i=0;i<this.data.length;i++){
            var province=this.data[i];
            var option=document.createElement('option');
            option.value=option.innerHTML=province.name;
            option.cities=province.cities;
            oProvince.appendChild(option);
        }
        oProvince.onchange=function () {
            oCity.innerHTML='<option value="-1">请选择城市</option>';
            var cities=this.options[this.selectedIndex].cities; // 获取当前下拉框选项
            //console.log(cities);
            for(var i=0;i<cities.length;i++){
                var city=cities[i];
                var option=document.createElement('option');
                option.value=option.innerHTML=city.name;
                oCity.appendChild(option);
            }
        }
    }
};