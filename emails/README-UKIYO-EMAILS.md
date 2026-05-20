# Sistema de Emails UKIYO - Guía de Uso

Este proyecto contiene el sistema completo de correos transaccionales y relacionales para UKIYO, construido sobre **React Email**. Siguiendo las directrices de marca, todo el diseño se ha creado respetando la paleta cromática, tipografías y el estilo sobrio, humano y premium de UKIYO.

## 📂 Estructura del Proyecto

El sistema está organizado para ser altamente escalable:

- `styles/theme.ts`: Contiene todos los *design tokens* de la marca (colores, espaciados, tipografías). Si necesitas cambiar un color principal, hazlo aquí y se aplicará a todos los emails.
- `components/`: Contiene los bloques base de diseño. 
  - `EmailLayout`: El wrapper principal que da el fondo y el ancho máximo.
  - `SignatureBlock`: La firma humana con la sutil animación de *pulse* en el avatar, compatible con email.
  - `CTAButton`, `Card`, `SectionTitle`, `SummaryBox`, etc.
- `templates/`: Contiene los **16 emails** funcionales listos para usarse y enviar a tus clientes. 
- `data/mockData.ts`: Contiene datos ficticios (pero realistas) para que puedas previsualizar cómo quedan los emails antes de conectarlos a tu base de datos o CRM real.

## 👁 Cómo previsualizar los emails

El proyecto está configurado para aprovechar el entorno de desarrollo de React Email, que crea una galería visual de todos tus templates en tiempo real.

1. Abre tu terminal en la carpeta principal del sistema de emails:
   ```bash
   cd /Applications/XAMPP/xamppfiles/htdocs/ukiyo/wp-content/themes/ukiyo/emails
   ```
2. Instala las dependencias (si no lo has hecho ya):
   ```bash
   npm install
   ```
3. Levanta el servidor de previsualización:
   ```bash
   npm run dev
   ```
4. Abre tu navegador en **http://localhost:3000** (o el puerto que te indique la terminal). Verás un panel lateral con los 16 emails listos para revisar, interactuar y ver su comportamiento tanto en versión escritorio como en versión móvil.

## 🛠 Cómo modificar los emails

### Cambiar el Copy o Textos
Abre el archivo correspondiente en la carpeta `templates/` (por ejemplo, `consulta_recibida.tsx`) y modifica el texto directamente dentro de los componentes `<Paragraph>`, `<SectionTitle>`, etc. Todo está en español y redactado de acuerdo a la voz de la marca.

### Adaptar datos dinámicos (Paso a Producción)
Cuando vayas a integrar los emails con tu backend (por ejemplo en WordPress, Node.js o una API externa), podrás usar la función `render` de React Email:

```tsx
import { render } from '@react-email/components';
import { BookingConfirmedEmail } from './templates/reserva_confirmada';

const htmlString = await render(
  <BookingConfirmedEmail 
    clientName="Laura" 
    destination="Costa Rica" 
    departureDate="12 Nov 2026"
  />
);

// htmlString contendrá el código HTML puro compatible para enviar vía Resend, SendGrid, Amazon SES, etc.
```

### Cambiar al remitente de la marca
Edita `mockData.ts` o pásale las *props* correctas a los templates para que la foto, nombre y teléfono del `SignatureBlock` (el bloque humano del final) muestren a la persona de tu equipo encargada del viaje.

## ✨ Detalles Técnicos Especiales
- **Animación del Avatar**: Se ha incluido un efecto `pulse` en CSS seguro para email dentro del `<SignatureBlock>`. Añade un halo sutil ('glow') perimetral a la imagen del asesor para simular "latido" o presencia humana. En clientes de email muy antiguos que no soporten animaciones, la degradación es perfecta (simplemente se verá como un círculo estático elegante).
- **Estudio Tipográfico**: Se ha usado interlineado amplio y colores contrastados pero cálidos (textos `#2C2C2C` sobre un fondo `#FEFCF8` - warm white) para mantener la limpieza editorial.
