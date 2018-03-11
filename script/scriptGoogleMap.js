  function start() {
                var geocoder;
                var infowindow;
                var place;
                var marker;
                geocoder = new google.maps.Geocoder(); //การค้นหาระบุตำแหน่ง
                var Position = new google.maps.LatLng(13.8470283, 100.57180010000002);
                var mapOptions = {
                    center: Position, //ตำแหน่งแสดงแผนที่เริ่มต้น
                    zoom: 13, //ซูมเริ่มต้น คือ 13
                    mapTypeId: google.maps.MapTypeId.ROADMAP //เลือกชนิดของแผนที่
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions); //สร้างแผนที่
                var input = document.getElementById('searchTextField'); //สร้างtext auto
                infowindow = new google.maps.InfoWindow(); //กล่องเนื้อหาข้อมูล
                marker = new google.maps.Marker({
                    position: Position,
                    draggable: true
                });
                marker.setMap(map);//แสดงตัวปักหมุด
                var autocomplete = new google.maps.places.Autocomplete(input); //สร้างautocomplete
                autocomplete.bindTo('bounds', map);
                google.maps.event.addListener(autocomplete, 'place_changed', function() {//ทำงานเมื่เลือกรายการค้นหา
 
                    infowindow.close(); //ปิดกล่องข้อความเสริม
                    marker.setVisible(false); //เอาหมุดออก
                    input.className = '';
                    place = autocomplete.getPlace(); //นำสถานที่ที่เราเลือกออกมาใส่ไว้ตัวแปร
    
                    if (!place.geometry) { //ไม่มีข้อมูลที่ค้นหา
                        input.className = 'notfound';
                        return;
                    }
                    if (place.geometry.viewport) { // ถ้ามีข้อมูลสถานที่  และรูปแบบการแสดง  ให้แสดง
                        map.fitBounds(place.geometry.viewport);
                    } else { //กำหนดเอง
                        map.setCenter(place.geometry.location);//Set Center ของแผนที่ตามตำแหน่งที่ค้นหา
                        map.setZoom(17);//กำหนดซูมแผนที่ขยายเป็น 17
                    }
                    marker.setPosition(place.geometry.location);//setตำแหน่งหมุดใหม่ที่ค้นหา
                    marker.setVisible(true);//แสดงหมุดในตำแหน่งใหม่ที่ค้นหา
                    var address = '';
                    if (place.address_components) { // เก็บชื่อ+สถานที่
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[3] && place.address_components[3].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');

                    }
                        $("#namelocation").val(place.name);//เก็บข้อมูลจากตำแหน่งที่ค้นหามาไว้ใช้ต่อ
                        $("#location").val(place.formatted_address);
                        $("#lat").val(place.geometry.location.lat());
                        $("#lng").val(place.geometry.location.lng());
                    infowindow.setContent('<div><strong>' + place.name + '</strong>' + address); //แสดงข้อมูลที่ปักหมุด

                     
                       
                    infowindow.open(map, marker); //แสดงตัวปักหมุด
                });
 
                
 
               
            }
             
            google.maps.event.addDomListener(window, 'load', start);//ทำงานตอนหน้านี้โหลดเสร็จแล้วให้ไปเรียกฟังก์ชั่น initialize