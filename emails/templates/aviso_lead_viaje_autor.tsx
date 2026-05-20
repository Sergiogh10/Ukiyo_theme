import * as React from 'react';
import { Section, Text, Link } from '@react-email/components';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Card } from '../components/Card';

interface ViajeAutorLeadNotificationEmailProps {
  travellerName?: string;
  travellerEmail?: string;
  travellerPhone?: string;
  tripName?: string;
  travellersCount?: string;
  notes?: string;
}

export const ViajeAutorLeadNotificationEmail = ({
  travellerName = '{{TRAVELLER_NAME}}',
  travellerEmail = '{{TRAVELLER_EMAIL}}',
  travellerPhone = '{{TRAVELLER_PHONE}}',
  tripName = '{{TRIP_NAME}}',
  travellersCount = '{{TRAVELLERS_COUNT}}',
  notes = '{{NOTES}}',
}: ViajeAutorLeadNotificationEmailProps) => {
  const previewText = 'Nuevo interés en un Viaje de Autor.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Nuevo interés en Viaje de Autor</SectionTitle>

          <Text style={intro}>
            Ha entrado una nueva solicitud desde el formulario de Viajes de Autor.
          </Text>

          <Section style={box}>
            <Text style={boxTitle}>Datos del viajero</Text>
            <Text style={row}><strong>Nombre:</strong> {travellerName}</Text>
            <Text style={row}><strong>Email:</strong> <Link href={`mailto:${travellerEmail}`} style={link}>{travellerEmail}</Link></Text>
            <Text style={row}><strong>Teléfono / WhatsApp:</strong> {travellerPhone}</Text>
          </Section>

          <Section style={box}>
            <Text style={boxTitle}>Solicitud</Text>
            <Text style={row}><strong>Viaje seleccionado:</strong> {tripName}</Text>
            <Text style={row}><strong>Número de personas:</strong> {travellersCount}</Text>
          </Section>

          <Section style={box}>
            <Text style={boxTitle}>Mensaje o dudas</Text>
            <Text style={message}>{notes}</Text>
          </Section>
        </Card>
      </Section>
      <Footer supportEmail="info@viajesukiyo.com" />
    </EmailLayout>
  );
};

const intro = {
  margin: '0 0 20px 0',
  fontSize: '16px',
  lineHeight: '26px',
  color: '#2C2C2C',
};

const box = {
  backgroundColor: '#F5F2ED',
  border: '1px solid #E8E1D5',
  borderRadius: '8px',
  padding: '20px',
  margin: '0 0 18px 0',
};

const boxTitle = {
  margin: '0 0 12px 0',
  color: '#6B3410',
  fontSize: '12px',
  lineHeight: '18px',
  fontWeight: '700',
  letterSpacing: '0.12em',
  textTransform: 'uppercase' as const,
};

const row = {
  margin: '0 0 8px 0',
  fontSize: '15px',
  lineHeight: '24px',
  color: '#2C2C2C',
};

const message = {
  margin: '0',
  fontSize: '15px',
  lineHeight: '24px',
  color: '#2C2C2C',
  whiteSpace: 'pre-line' as const,
};

const link = {
  color: '#6B3410',
  textDecoration: 'none',
};

export default ViajeAutorLeadNotificationEmail;
