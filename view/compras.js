const btn_agg_camisa = document.getElementById('btn-agg-camisa')
        const btn_agg_pantalon = document.getElementById('btn-agg-pantalon')
        const btn_agg_gorra = document.getElementById('btn-agg-gorra')
        const btn_agg_zapato = document.getElementById('btn-agg-zapato')
        const info_camisa = document.getElementById('info-camisa')
        const info_pantalon = document.getElementById('info-pantalon')
        const info_gorra = document.getElementById('info-gorra')
        const info_zapato = document.getElementById('info-zapato')
        const cerrar_info_camisa = document.getElementById('cerrar-info-camisa')
        const cerrar_info_pantalon = document.getElementById('cerrar-info-pantalon')
        const cerrar_info_gorra = document.getElementById('cerrar-info-gorra')
        const cerrar_info_zapato = document.getElementById('cerrar-info-zapato')
        let cant_camisa = document.getElementById('cant-camisa')
        let cant_pantalon = document.getElementById('cant-pantalon')
        let cant_gorra = document.getElementById('cant-gorra')
        let cant_zapato = document.getElementById('cant-zapato')
        let total_puntos_camisa = document.querySelector('.total__puntos-camisa')
        let total_puntos_pantalon = document.querySelector('.total__puntos-pantalon')
        let total_puntos_gorra = document.querySelector('.total__puntos-gorra')
        let total_puntos_zapato = document.querySelector('.total__puntos-zapato')
        const total_valor_puntos = document.getElementById('total-valor-puntos')
        let total_puntaje_camisa=0;
        let total_puntaje_pantalon=0;
        let total_puntaje_gorra=0;
        let total_puntaje_zapato=0;
        let total_valor_puntos_sumados=0
        btn_agg_camisa.addEventListener('click',()=>{
            info_camisa.classList.remove('info-camisa')
        })
        btn_agg_pantalon.addEventListener('click',()=>{
            info_pantalon.classList.remove('info-pantalon')
        })
        btn_agg_gorra.addEventListener('click',()=>{
            info_gorra.classList.remove('info-gorra')
        })
        btn_agg_zapato.addEventListener('click',()=>{
            alert(document.getElementById('prue').value);
            info_zapato.classList.remove('info-zapato')
        })
        cerrar_info_camisa.addEventListener('click',()=>{
            info_camisa.classList.add('info-camisa')
            total_valor_puntos_sumados-=total_puntaje_camisa
            total_puntos_camisa.textContent=0
            total_puntaje_camisa=0;
            total_valor_puntos.textContent=total_valor_puntos_sumados
        })
        cerrar_info_pantalon.addEventListener('click',()=>{
            info_pantalon.classList.add('info-pantalon')
            total_valor_puntos_sumados-=total_puntaje_pantalon
            total_puntos_pantalon.textContent=0
            total_puntaje_pantalon=0;
            total_valor_puntos.textContent=total_valor_puntos_sumados
        })
        cerrar_info_gorra.addEventListener('click',()=>{
            info_gorra.classList.add('info-gorra')
            total_valor_puntos_sumados-=total_puntaje_gorra
            total_puntos_gorra.textContent=0
            total_puntaje_gorra=0;
            total_valor_puntos.textContent=total_valor_puntos_sumados
        })
        cerrar_info_zapato.addEventListener('click',()=>{
            info_zapato.classList.add('info-zapato')
            total_valor_puntos_sumados-=total_puntaje_zapato
            total_puntos_zapato.textContent=0
            total_puntaje_zapato=0;
            total_valor_puntos.textContent=total_valor_puntos_sumados
            cant_zapato.value=0
        })      
        cant_camisa.addEventListener('focusout',()=>{
            total_puntos_camisa.textContent = cant_camisa.value*500
            total_puntaje_camisa=cant_camisa.value*500
            total_valor_puntos_sumados+=total_puntaje_camisa
            total_valor_puntos.textContent=total_valor_puntos_sumados
        })
        cant_pantalon.addEventListener('focusout',()=>{
            total_puntos_pantalon.textContent = cant_pantalon.value*500
            total_puntaje_pantalon=cant_pantalon.value*500
            total_valor_puntos_sumados+=total_puntaje_pantalon
            total_valor_puntos.textContent=total_valor_puntos_sumados
        })
        cant_gorra.addEventListener('focusout',()=>{
            total_puntos_gorra.textContent = cant_gorra.value*500
            total_puntaje_gorra=cant_gorra.value*500
            total_valor_puntos_sumados+=total_puntaje_gorra
            total_valor_puntos.textContent=total_valor_puntos_sumados
        })
        cant_zapato.addEventListener('focusout',()=>{
            total_puntos_zapato.textContent = cant_zapato.value*500
            total_puntaje_zapato=cant_zapato.value*500
            total_valor_puntos_sumados+=total_puntaje_zapato
            total_valor_puntos.textContent=total_valor_puntos_sumados
        })