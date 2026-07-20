document.addEventListener('DOMContentLoaded', function() {
  // Obtener el ID del producto de la URL
  const urlParams = new URLSearchParams(window.location.search);
  const productId = urlParams.get('product');
  
  // Si no hay un producto en la URL, no hacemos nada
  if (!productId) return;
  
  // Obtener el nombre del producto y el título para metadata
  const productTitle = document.getElementById('product-title')?.textContent || '';
  const productName = document.getElementById('product-name')?.textContent || '';
  
  // Construir la URL completa del producto para compartir
  const currentUrl = window.location.href;
  const shareUrl = encodeURIComponent(currentUrl);
  const shareTitle = encodeURIComponent(productTitle || productName);
  const shareDescription = encodeURIComponent(document.getElementById('product-description')?.textContent || 'Conoce nuestros productos');
  
  // Obtener imagen del producto para compartir
  const productImage = document.getElementById('product-image');
  const imageUrl = productImage ? encodeURIComponent(window.location.origin + '/' + productImage.getAttribute('src')) : '';
  
  // Seleccionar todos los iconos de compartir
  const shareIcons = document.querySelectorAll('.share-icons a');
  
  // Para cada icono, asignar la URL de compartir correspondiente
  shareIcons.forEach(icon => {
    const img = icon.querySelector('img');
    if (!img) return;
    
    // Determinar qué red social es según la imagen
    if (img.getAttribute('alt').includes('Facebook')) {
      icon.href = `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;
      icon.setAttribute('target', '_blank');
      icon.setAttribute('rel', 'noopener noreferrer');
    } 
    else if (img.getAttribute('alt').includes('LinkedIn')) {
      icon.href = `https://www.linkedin.com/shareArticle?mini=true&url=${shareUrl}&title=${shareTitle}&summary=${shareDescription}`;
      icon.setAttribute('target', '_blank');
      icon.setAttribute('rel', 'noopener noreferrer');
    } 
    else if (img.getAttribute('alt').includes('Pinterest')) {
      icon.href = `https://pinterest.com/pin/create/button/?url=${shareUrl}&media=${imageUrl}&description=${shareDescription}`;
      icon.setAttribute('target', '_blank');
      icon.setAttribute('rel', 'noopener noreferrer');
    } 
    else if (img.getAttribute('alt').includes('WhatsApp')) {
      // Si es móvil, usar api, si no web.whatsapp.com
      const userAgent = navigator.userAgent || navigator.vendor || window.opera;
      const isMobile = /android|iphone|ipad|ipod|blackberry|windows phone/i.test(userAgent);
      
      const whatsappBaseUrl = isMobile ? 'whatsapp://send' : 'https://web.whatsapp.com/send';
      const whatsappMessage = `${shareTitle}: ${shareUrl}`;
      
      icon.href = `${whatsappBaseUrl}?text=${encodeURIComponent(whatsappMessage)}`;
      icon.setAttribute('target', '_blank');
      icon.setAttribute('rel', 'noopener noreferrer');
    } 
    else if (img.getAttribute('alt').includes('Enlace')) {
      // Para el botón de copiar al portapapeles
      icon.href = 'javascript:void(0)';
      icon.addEventListener('click', function(e) {
        e.preventDefault();
        copyLinkToClipboard(currentUrl);
      });
    }
  });
  
  // Función para mostrar un mensaje de notificación
  function showNotification(message, duration = 2000) {
    // Verificar si ya existe una notificación
    let notification = document.querySelector('.copy-notification');
    
    if (!notification) {
      // Crear la notificación si no existe
      notification = document.createElement('div');
      notification.className = 'copy-notification';
      notification.style.position = 'fixed';
      notification.style.bottom = '20px';
      notification.style.left = '50%';
      notification.style.transform = 'translateX(-50%)';
      notification.style.backgroundColor = '#0d3393';
      notification.style.color = 'white';
      notification.style.padding = '10px 20px';
      notification.style.borderRadius = '5px';
      notification.style.fontFamily = '"Outfit", sans-serif';
      notification.style.fontSize = '14px';
      notification.style.zIndex = '9999';
      notification.style.boxShadow = '0 2px 10px rgba(0,0,0,0.2)';
      notification.style.opacity = '0';
      notification.style.transition = 'opacity 0.3s ease';
      
      document.body.appendChild(notification);
    }
    
    // Actualizar el mensaje
    notification.textContent = message;
    
    // Hacer visible la notificación
    setTimeout(() => {
      notification.style.opacity = '1';
    }, 10);
    
    // Ocultar después del tiempo especificado
    setTimeout(() => {
      notification.style.opacity = '0';
      
      // Eliminar el elemento después de la transición
      setTimeout(() => {
        if (notification.parentNode) {
          notification.parentNode.removeChild(notification);
        }
      }, 300);
    }, duration);
  }
  
  // Función para copiar el enlace al portapapeles
  function copyLinkToClipboard(text) {
    // Técnica compatible con navegadores modernos
    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(text)
        .then(() => {
          showNotification('¡Enlace copiado al portapapeles!');
        })
        .catch(err => {
          console.error('No se pudo copiar: ', err);
          fallbackCopyToClipboard(text);
        });
    } else {
      fallbackCopyToClipboard(text);
    }
  }
  
  // Método alternativo para navegadores que no soportan clipboard API
  function fallbackCopyToClipboard(text) {
    const textArea = document.createElement('textarea');
    textArea.value = text;
    
    // Hacer invisible el textArea pero mantenerlo en el DOM
    textArea.style.position = 'fixed';
    textArea.style.top = '0';
    textArea.style.left = '0';
    textArea.style.width = '2em';
    textArea.style.height = '2em';
    textArea.style.padding = '0';
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';
    textArea.style.background = 'transparent';
    textArea.style.opacity = '0';
    
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    let successful = false;
    try {
      successful = document.execCommand('copy');
    } catch (err) {
      console.error('No se pudo copiar el texto: ', err);
    }
    
    document.body.removeChild(textArea);
    
    if (successful) {
      showNotification('¡Enlace copiado al portapapeles!');
    } else {
      showNotification('No se pudo copiar el enlace. Inténtalo manualmente.');
    }
  }
  
  // Agregar metadatos Open Graph para mejor visualización en redes sociales
  function addOpenGraphMetaTags() {
    // Solo agregar si no existen ya
    if (!document.querySelector('meta[property="og:url"]')) {
      // Crear y agregar meta tags para Open Graph
      const metaTags = [
        {property: 'og:url', content: window.location.href},
        {property: 'og:title', content: productTitle || productName},
        {property: 'og:description', content: document.getElementById('product-description')?.textContent || 'Descubre nuestros productos'},
        {property: 'og:image', content: productImage ? window.location.origin + '/' + productImage.getAttribute('src') : ''},
        {property: 'og:type', content: 'product'}
      ];
      
      metaTags.forEach(meta => {
        const metaTag = document.createElement('meta');
        metaTag.setAttribute('property', meta.property);
        metaTag.setAttribute('content', meta.content);
        document.head.appendChild(metaTag);
      });
    }
  }
  
  // Agregar meta tags Open Graph si no existen ya
  addOpenGraphMetaTags();
});