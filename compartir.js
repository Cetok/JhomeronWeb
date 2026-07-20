document.addEventListener('DOMContentLoaded', function() {
  // Obtener los parámetros de URL para identificar el producto
  const urlParams = new URLSearchParams(window.location.search);
  const productId = urlParams.get('id');
  const productName = urlParams.get('nombre');
  
  // Solo continuar si hay un ID de producto
  if (!productId) return;
  
  // Obtener el título y descripción del producto
  const productTitle = document.getElementById('product-title')?.textContent || '';
  const productDescription = document.getElementById('product-description')?.textContent || '';
  const productDisplayName = document.getElementById('product-name')?.textContent || '';
  
  // Construir la URL completa para compartir
  const currentUrl = window.location.href;
  const shareUrl = encodeURIComponent(currentUrl);
  
  // Obtener el texto para compartir (título o nombre del producto)
  const shareTitle = encodeURIComponent(productTitle || productDisplayName || 'Producto Jhomeron');
  const shareDescription = encodeURIComponent(productDescription || 'Descubre nuestros productos de alta calidad');
  
  // Obtener la imagen del producto para compartir en plataformas que lo admitan
  const productImage = document.getElementById('product-image');
  let imageUrl = '';
  
  if (productImage) {
    // Convertir URL relativa a absoluta para que funcione al compartir
    const imageSrc = productImage.getAttribute('src');
    imageUrl = encodeURIComponent(getAbsoluteUrl(imageSrc));
  }
  
  // Configurar los enlaces de compartir
  const shareIcons = document.querySelectorAll('.share-icons a');
  shareIcons.forEach(icon => {
    const img = icon.querySelector('img');
    if (!img) return;
    
    const altText = img.getAttribute('alt').toLowerCase();
    
    if (altText.includes('facebook')) {
      // Facebook sharing URL
      icon.href = `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;
      icon.setAttribute('target', '_blank');
      icon.setAttribute('rel', 'noopener noreferrer');
    } 
    else if (altText.includes('linke')) {
      // LinkedIn sharing URL
      icon.href = `https://www.linkedin.com/shareArticle?mini=true&url=${shareUrl}&title=${shareTitle}&summary=${shareDescription}`;
      icon.setAttribute('target', '_blank');
      icon.setAttribute('rel', 'noopener noreferrer');
    } 
    else if (altText.includes('pinte')) {
      // Pinterest sharing URL - requires an image
      icon.href = `https://pinterest.com/pin/create/button/?url=${shareUrl}&media=${imageUrl}&description=${shareDescription}`;
      icon.setAttribute('target', '_blank');
      icon.setAttribute('rel', 'noopener noreferrer');
    } 
    else if (altText.includes('wasap') || altText.includes('whatsapp')) {
      // WhatsApp sharing URL - different for mobile and desktop
      const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
      const whatsappBaseUrl = isMobile ? 'whatsapp://send' : 'https://web.whatsapp.com/send';
      const whatsappText = `${shareTitle}: ${decodeURIComponent(shareUrl)}`;
      
      icon.href = `${whatsappBaseUrl}?text=${encodeURIComponent(whatsappText)}`;
      icon.setAttribute('target', '_blank');
      icon.setAttribute('rel', 'noopener noreferrer');
    } 
    else if (altText.includes('enlace')) {
      // Copy link to clipboard
      icon.href = 'javascript:void(0)';
      icon.addEventListener('click', function(e) {
        e.preventDefault();
        copyLinkToClipboard(currentUrl);
      });
    }
  });
  
  // Función para convertir URL relativa a absoluta
  function getAbsoluteUrl(relativeUrl) {
    if (relativeUrl.startsWith('http')) {
      return relativeUrl; // Ya es una URL absoluta
    }
    
    const baseUrl = window.location.origin;
    
    // Manejar rutas relativas con o sin / al principio
    if (relativeUrl.startsWith('/')) {
      return `${baseUrl}${relativeUrl}`;
    } else {
      // Para rutas relativas que no empiezan con '/'
      // Obtener la ruta actual y quitar el archivo final
      const currentPath = window.location.pathname.split('/').slice(0, -1).join('/') + '/';
      return `${baseUrl}${currentPath}${relativeUrl}`;
    }
  }
  
  // Función para mostrar una notificación
  function showNotification(message, duration = 2000) {
    // Verificar si ya existe una notificación
    let notification = document.querySelector('.copy-notification');
    
    if (!notification) {
      // Crear la notificación con estilos
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
    // Preferir el API clipboard moderno para navegadores que lo soportan
    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(text)
        .then(() => {
          showNotification('¡Enlace copiado al portapapeles!');
        })
        .catch(err => {
          console.error('Error al copiar: ', err);
          fallbackCopyToClipboard(text);
        });
    } else {
      // Método alternativo para navegadores que no soportan clipboard API
      fallbackCopyToClipboard(text);
    }
  }
  
  // Método alternativo para navegadores que no soportan clipboard API
  function fallbackCopyToClipboard(text) {
    const textArea = document.createElement('textarea');
    textArea.value = text;
    
    // Hacer invisible el textarea
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
      console.error('Error al copiar texto: ', err);
    }
    
    document.body.removeChild(textArea);
    
    if (successful) {
      showNotification('¡Enlace copiado al portapapeles!');
    } else {
      showNotification('No se pudo copiar el enlace. Inténtalo manualmente.');
    }
  }
  
  // Actualizar o crear metatags OG para mejorar cómo se ven los enlaces compartidos
  function updateMetaTags() {
    // Actualizar o crear meta tags Open Graph
    const metaTags = [
      {property: 'og:url', content: window.location.href},
      {property: 'og:title', content: productTitle || productDisplayName || 'Producto Jhomeron'},
      {property: 'og:description', content: productDescription || 'Descubre nuestros productos de alta calidad'},
      {property: 'og:type', content: 'product'}
    ];
    
    // Agregar la imagen solo si existe
    if (imageUrl) {
      metaTags.push({property: 'og:image', content: decodeURIComponent(imageUrl)});
    }
    
    // Iterar sobre los metatags y actualizarlos o crearlos
    metaTags.forEach(meta => {
      let metaTag = document.querySelector(`meta[property="${meta.property}"]`);
      
      if (metaTag) {
        // Actualizar tag existente
        metaTag.setAttribute('content', meta.content);
      } else {
        // Crear nuevo tag
        metaTag = document.createElement('meta');
        metaTag.setAttribute('property', meta.property);
        metaTag.setAttribute('content', meta.content);
        document.head.appendChild(metaTag);
      }
    });
  }
  
  // Actualizar los meta tags
  updateMetaTags();
});