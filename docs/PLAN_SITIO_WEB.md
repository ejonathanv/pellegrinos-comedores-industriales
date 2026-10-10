# Plan de trabajo: de landing a sitio web posicionable

Plan basado en el documento *Diagnóstico Sitio Web Comedores Pellegrinos (estudio de posicionamiento orgánico)*. El objetivo es convertir la landing actual de una sola página en un sitio B2B en español, capaz de posicionarse en buscadores y generar solicitudes de cotización calificadas.

Marca cada tarea con `[x]` al terminarla y anota la fecha o el commit cuando sea útil.

---

## Objetivos

- Aparecer en búsquedas de alto valor: "comedores industriales Tijuana", "comedor para maquiladoras Tijuana", "catering corporativo Tijuana" y "coffee break para empresas Tijuana".
- Aumentar el porcentaje de visitantes que dejan datos útiles para cotizar: empresa, número de comensales, turnos, ubicación y si ya existe cocina.
- Dar a Recursos Humanos, Operaciones, Seguridad e Higiene y Compras razones verificables para elegir a Pellegrino's.

## Regla de honestidad

Solo se publica lo que Pellegrino's puede respaldar de forma operativa y documental. No publicar sin validar:

- NOM, Distintivo H, certificaciones, vigencias o auditorías sin documento.
- Capacidad diaria, cobertura geográfica o tiempos de respuesta no respaldados.
- Dietas especiales, nutriólogo o ciclos de menú que no sean práctica habitual.
- Testimonios anónimos, logos sin permiso o cifras infladas.

---

## Fase 0: Base actual (ya realizado)

- [x] Contenido local alineado con producción: clientes, servicios, sección de excelencia y contacto (`4785b68`).
- [x] Quitar el Distintivo H porque no se cuenta con él (`0e09dd9`).
- [x] Actualizar a 3 años de experiencia (`0e09dd9`).
- [x] Dirección unificada: "Ciudad Industrial 22444 Tijuana" (`0e09dd9`).
- [x] Teléfono, correo y dirección en el footer (`89f9b64`).
- [x] Enlace de Instagram a `pellegrino_s_comedores` (`59158ea`).
- [x] `robots.txt` permite el rastreo.
- [x] Idioma por defecto en español (`APP_LOCALE=es`).

---

## Fase 1: Validación con el cliente (antes de publicar contenido nuevo)

Esta fase evita publicar mensajes que el equipo comercial no pueda sostener. Responsable: área comercial y operativa de Pellegrino's.

- [ ] Confirmar la oferta real de cada servicio: comedor industrial, coffee break y catering corporativo.
- [ ] Confirmar zonas de servicio y cobertura.
- [ ] Confirmar capacidad (comensales por día o por turno).
- [ ] Confirmar horarios y tipos de turno que se atienden (incluye nocturnos).
- [ ] Confirmar si se opera en sitio, por entrega o ambos.
- [ ] Reunir documentos vigentes: REPSE, constancias DC3, manejo higiénico.
- [ ] Obtener permiso por escrito para mostrar logos de clientes (Atlas, Nadro, Farmacias Similares, Tecma).
- [ ] Conseguir testimonios reales con empresa, cargo y permiso de publicación.
- [ ] Documentar el proceso comercial: diagnóstico, propuesta, implementación y seguimiento.
- [ ] Definir el tiempo de respuesta comercial interno (SLA realista).
- [ ] Reunir fotos propias: instalaciones, montaje, equipo y comida.
- [ ] Reunir ejemplos de menú reales y alternativas disponibles.
- [ ] Definir el responsable operativo que se presentará como contacto.

---

## Fase 2: Fundamentos técnicos SEO (días 1 a 30)

### Idioma

Decisión: el español es la versión principal en la raíz del sitio y el inglés vive en rutas separadas bajo `/en/`. Cada idioma tiene su propia URL indexable.

```text
Español (principal)                      Inglés
/                                        /en
/comedores-industriales-tijuana          /en/industrial-dining-tijuana
/comedor-para-maquiladoras-tijuana       /en/factory-cafeteria-tijuana
/catering-corporativo-tijuana            /en/corporate-catering-tijuana
/coffee-break-empresarial-tijuana        /en/corporate-coffee-break-tijuana
/nosotros-y-certificaciones              /en/about-and-certifications
/contacto                                /en/contact
```

- [ ] Español en la raíz con `html lang="es-MX"`.
- [ ] Inglés bajo el prefijo `/en/` con `html lang="en"` y slugs traducidos.
- [ ] Middleware que fija el idioma según la URL, no según la sesión.
- [ ] Quitar la ruta `/setlocale/{locale}` y el idioma guardado en sesión.
- [ ] Selector de idioma que enlaza a la página equivalente en el otro idioma (no a la portada).
- [ ] Etiquetas `hreflang` en cada página: `es-MX`, `en` y `x-default` apuntando al español.
- [ ] `canonical` de cada página apunta a su propia versión de idioma.
- [ ] El sitemap incluye ambas versiones de cada página con sus alternativas `hreflang`.
- [ ] Títulos, descripciones y Open Graph traducidos por idioma (`og:locale` `es_MX` y `en_US`).
- [ ] Redirigir `?lang` o enlaces antiguos de cambio de idioma a la URL correcta con 301 si existen en producción.

### Metadatos

- [ ] `title` único por URL con servicio y ciudad (hoy el título es solo `APP_NAME`).
- [ ] `meta description` única por URL con beneficio y llamada a la acción.
- [ ] Quitar `meta keywords` (no aporta y contiene términos que no aplican, como "vending saludable").
- [ ] `link rel="canonical"` en cada URL.
- [ ] Etiquetas Open Graph y Twitter con imagen y textos en español.

### Descubrimiento

- [ ] Generar `sitemap.xml` accesible (en producción respondía 404).
- [ ] Referenciar el sitemap en `robots.txt`.
- [ ] Verificar el sitio en Google Search Console y enviar el sitemap.

### Datos estructurados

- [ ] JSON-LD `LocalBusiness` / `Organization` con datos reales (nombre, teléfono, correo, dirección, horario, redes).
- [ ] JSON-LD `Service` en cada página de servicio.
- [ ] JSON-LD `BreadcrumbList` en páginas internas.
- [ ] JSON-LD `FAQPage` donde haya preguntas frecuentes.
- [ ] Validar con la prueba de resultados enriquecidos de Google antes de publicar.

### Rendimiento móvil

- [ ] Medir con PageSpeed Insights / Lighthouse y guardar la línea base.
- [ ] Convertir imágenes a WebP/AVIF y definir `width`/`height`.
- [ ] Carga diferida (`loading="lazy"`) en imágenes fuera de la primera pantalla.
- [ ] Revisar el peso de los videos de portada.
- [ ] Diferir scripts no críticos (Font Awesome kit, reCAPTCHA, plugins del tema).

### Analítica

- [ ] Instalar GA4 (o equivalente).
- [ ] Evento: clic en WhatsApp.
- [ ] Evento: clic en teléfono.
- [ ] Evento: envío de formulario.
- [ ] Evento: servicio de interés elegido en el formulario.
- [ ] Registrar la landing de origen de cada solicitud.

---

## Fase 3: Arquitectura y conversión principal (días 1 a 30)

### Nueva estructura de páginas

Pasar de una sola página con anclas a URLs por intención de búsqueda. Cada página con su propio título, contenido, llamada a la acción, preguntas frecuentes y formulario.

```text
/                                      Inicio
/comedores-industriales-tijuana        Página principal de servicio
/comedor-para-maquiladoras-tijuana     Fase 4
/catering-corporativo-tijuana          Fase 4
/coffee-break-empresarial-tijuana      Fase 4
/nosotros-y-certificaciones            Fase 4
/recursos                              Fase 5
/contacto                              Cotización
```

Cada página existe también en inglés bajo `/en/` (ver la sección Idioma de la Fase 2).

- [ ] Crear rutas y controlador para páginas internas en Laravel, en español y en inglés.
- [ ] Layout común con header, footer y navegación hacia las nuevas URLs (no solo anclas).
- [ ] Migas de pan (breadcrumbs) en páginas internas.

### Inicio

- [ ] Nuevo hero en español: "Comedores industriales en Tijuana para empresas que necesitan una operación de alimentos confiable. Diseñamos soluciones de comedor, coffee break y catering corporativo de acuerdo con las necesidades de tu equipo." Botón: **Solicitar cotización**.
- [ ] Texto de confianza cerca del inicio: "Servicio local desde Ciudad Industrial, Tijuana. Conoce nuestro proceso, instalaciones y respaldos antes de solicitar tu propuesta." Enlaces: **Ver certificaciones** y **Conocer servicios**.
- [ ] Subir la prueba de confianza (REPSE, capacitación, clientes) cerca del inicio en lugar de solo en el footer.
- [ ] Tarjetas de servicio que enlacen a su página propia.

### Landing `/comedores-industriales-tijuana`

Título sugerido: *Comedores industriales en Tijuana para empresas | Pellegrino's*

- [ ] Encabezado: servicio, ubicación, beneficio y siguiente paso.
- [ ] Prueba inmediata: Ciudad Industrial Tijuana, atención por WhatsApp, REPSE y capacitación verificable.
- [ ] Problemas que resuelve: menos salidas durante el turno, logística ordenada, servicio estructurado.
- [ ] Qué incluye: diagnóstico, propuesta de menú, operación acordada, atención y seguimiento (ajustar a lo que realmente se ofrece).
- [ ] Proceso: conocemos tu operación, proponemos el servicio, acordamos el alcance y acompañamos el arranque.
- [ ] Prueba social: caso o testimonio autorizado.
- [ ] Preguntas frecuentes: turnos nocturnos, operación en sitio, información necesaria para cotizar.
- [ ] Formulario calificado.

### Formulario de cotización calificado

Texto de llamada a la acción: "Cuéntanos cuántas personas atiendes y cómo opera tu planta. Con esos datos podremos preparar una propuesta más útil para tu empresa."

- [ ] Empresa y nombre (obligatorio).
- [ ] Teléfono o WhatsApp y correo (obligatorio).
- [ ] Servicio de interés: comedor industrial, catering o coffee break (obligatorio).
- [ ] Número aproximado de comensales o asistentes (obligatorio).
- [ ] Turnos y horarios (obligatorio para comedor).
- [ ] Ubicación del servicio (obligatorio).
- [ ] ¿Cuentan con cocina o área de servicio? (recomendado).
- [ ] Fecha del evento (obligatorio para catering y coffee break).
- [ ] Campos condicionales según el servicio elegido.
- [ ] Actualizar `ContactRequest`, correos de notificación y confirmación con los nuevos campos.
- [ ] Guardar la landing de origen en la solicitud.

---

## Fase 4: Landings de servicio y confianza (días 31 a 60)

Cada página con texto y ejemplos propios; nada de contenido duplicado.

### `/comedor-para-maquiladoras-tijuana`

Título sugerido: *Comedor para maquiladoras en Tijuana | Servicio por turnos*

- [ ] Turnos y operación para manufactura.
- [ ] Operación en sitio o entrega (si aplica).
- [ ] Flujo de servicio e higiene.
- [ ] Caso real autorizado.
- [ ] Llamada a la acción: **Cotizar comedor para mi planta**.
- [ ] Formulario.

### `/catering-corporativo-tijuana`

Título sugerido: *Catering corporativo en Tijuana para empresas y capacitaciones*

- [ ] Modalidades, montaje y alcance.
- [ ] Galería propia de eventos.
- [ ] Preguntas frecuentes.
- [ ] Formulario con fecha, asistentes y sede.
- [ ] Llamada a la acción: **Cotizar mi evento**.

### `/coffee-break-empresarial-tijuana`

Título sugerido: *Coffee break empresarial en Tijuana | Pellegrino's*

- [ ] Opciones reales y logística.
- [ ] Mínimo de personas (si aplica) y tiempos.
- [ ] Imágenes propias.
- [ ] Formulario corto.
- [ ] Llamada a la acción: **Solicitar propuesta**.

### `/nosotros-y-certificaciones`

- [ ] Historia y años reales de operación.
- [ ] Equipo y responsable operativo.
- [ ] Instalaciones con fotos propias.
- [ ] REPSE y documentos autorizados.
- [ ] Clientes con permiso.
- [ ] Proceso: diagnóstico, propuesta, implementación y seguimiento.
- [ ] Llamada a la acción: **Hablar con un asesor**.

### SEO local

- [ ] Google Business Profile: categoría, nombre comercial, teléfono, URL, horario, dirección o área de servicio, fotos y servicios. Misma información que el sitio.
- [ ] Rutina ética para pedir reseñas tras un servicio satisfactorio y responderlas.
- [ ] Perfiles en directorios industriales, cámaras y asociaciones con nombre, dirección y teléfono idénticos.
- [ ] Revisar consistencia de datos en Facebook, Instagram y WhatsApp.
- [ ] Revisar si Facebook sigue como `PellegrinosCatering` o cambió de nombre.

---

## Fase 5: Contenido de apoyo (días 31 a 60)

- [ ] Crear la sección `/recursos`.
- [ ] Guía: *Cuánto cuesta un comedor industrial en Tijuana y qué evaluar* (`/recursos/costo-comedor-industrial-tijuana`).
- [ ] Guía: *Cómo implementar un comedor industrial sin afectar la operación* (`/recursos/como-implementar-comedor-industrial`).
- [ ] Enlaces internos desde cada guía hacia la landing de servicio correspondiente.

---

## Fase 6: Autoridad y optimización (días 61 a 90)

- [ ] Uno o dos casos de éxito autorizados: contexto, solución, alcance y resultado, sin datos confidenciales.
- [ ] Revisar consultas, clics y conversiones en Search Console y analítica.
- [ ] Ajustar títulos, llamadas a la acción y formularios según los datos.
- [ ] Contenido mensual basado en objeciones reales de ventas: turnos, higiene, capacidad, menú, costo total y eventos corporativos.
- [ ] Participación en cámaras o ferias y menciones editoriales legítimas (sin comprar enlaces).
- [ ] Evaluar landings para otras ciudades solo si hay atención real ahí.

---

## Indicadores de avance

| Indicador | Qué mide |
|-----------|----------|
| Impresiones y clics orgánicos no marcarios | Si las nuevas páginas captan demanda de servicio |
| Solicitudes calificadas | Formularios con empresa, volumen y necesidad definida |
| Tasa de conversión por landing | Porcentaje de visitas que llaman, escriben o cotizan |
| Clics en WhatsApp y llamadas | Intención comercial inmediata |
| Tiempo de respuesta comercial | Cumplimiento del SLA interno |
| Oportunidades ganadas desde orgánico | Impacto real en ventas (etiquetar origen) |

El posicionamiento orgánico no tiene plazo ni posición garantizados. Las primeras señales correctas son: páginas indexadas, más impresiones en servicios locales y contactos mejor calificados.
