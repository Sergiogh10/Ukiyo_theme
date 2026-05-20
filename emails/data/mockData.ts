export interface CommonEmailProps {
  clientName: string;
  tripTitle?: string;
  senderName?: string;
  senderRole?: string;
  senderPhotoUrl?: string;
  senderEmail?: string;
  senderPhone?: string;
  supportEmail?: string;
}

export const mockCommonProps: CommonEmailProps = {
  clientName: 'María',
  tripTitle: 'Esencia de Japón',
  senderName: 'Víctor García-Heras',
  senderRole: 'CEO - Viajes UKIYO',
  senderPhotoUrl: '/static/victor_ceo.JPG', // URL temporal para preview local
  senderEmail: 'info@viajesukiyo.com',
  senderPhone: '+34 635 300 441',
  supportEmail: 'victor@viajesukiyo.com',
};

export const mockTripData = {
  destination: 'vuestro destino',
  departureDate: '15 de Octubre, 2026',
  returnDate: '30 de Octubre, 2026',
  travelersCount: 2,
};

export const mockPaymentData = {
  amount: '1.500€',
  dueDate: '10 de Septiembre, 2026',
  concept: 'Segundo pago del viaje',
  paymentUrl: 'https://viajesukiyo.com/pago/123',
};

export const mockUrls = {
  proposalUrl: 'https://viajesukiyo.com/propuesta/123',
  invoiceUrl: 'https://viajesukiyo.com/factura/123',
  documentsUrl: 'https://viajesukiyo.com/documentos/123',
  reviewUrl: 'https://g.page/r/example/review',
  formUrl: 'https://viajesukiyo.com/feedback/123',
};

export const mockLocalTips = [
  {
    title: 'Moverse por el destino',
    description: 'Antes de llegar, conviene revisar qué medios de transporte usaréis más y si os interesa llevar descargadas rutas, tickets o apps útiles.',
  },
  {
    title: 'Costumbres locales',
    description: 'Siempre ayuda conocer algunos códigos básicos del lugar para moveros con más soltura y vivir la experiencia con más contexto.',
  },
  {
    title: 'Pequeños apuntes útiles',
    description: 'A veces detalles como horarios, formas de pago o recomendaciones prácticas marcan bastante el día a día durante el viaje.',
  }
];

export const mockChecklist = [
  'Pasaporte en vigor (mínimo 6 meses de validez)',
  'Seguro de viaje revisado o activado',
  'Documentación necesaria descargada o guardada en el móvil',
  'Adaptadores, cargadores y lo esencial para el trayecto a mano',
];
