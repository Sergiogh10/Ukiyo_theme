import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { ChecklistBlock } from '../components/ChecklistBlock';
import { ContactBlock } from '../components/ContactBlock';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockUrls, mockTripData } from '../data/mockData';

interface TravelDocumentsEmailProps extends CommonEmailProps {
  documentsUrl?: string;
  destination?: string;
}

export const TravelDocumentsEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  documentsUrl = mockUrls.documentsUrl,
  destination = mockTripData.destination,
}: TravelDocumentsEmailProps) => {
  const previewText = 'Tu documentación de viaje.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Aquí tienes todo lo necesario para tu expedición a {destination}. 
          </Paragraph>
          <Paragraph>
            Hemos unificado todas las reservas, billetes, bonos de alojamiento y el itinerario detallado en un solo lugar. Revísalo todo con tranquilidad y llévalo descargado en tu dispositivo para tenerlo siempre a mano durante el trayecto, aunque te recomendamos imprimirlo si eres de llevar papel.
          </Paragraph>

          <CTAButton href={documentsUrl}>
            Acceder a mis documentos de viaje
          </CTAButton>

          <SectionTitle as="h3">Qué vas a encontrar aquí:</SectionTitle>
          <ChecklistBlock items={[
            'Itinerario final detallado día a día',
            'Billetes y confirmaciones de vuelos',
            'Bonos de todos los alojamientos seleccionados',
            'Tickets para actividades guiadas y transportes locales',
            'Directorio rápido de contactos de emergencia'
          ]} />

          <Paragraph>
            Dales un último repaso. La idea es que a partir de este punto del proceso ya solo quede la anticipación y las ganas de estar allí.
          </Paragraph>
          
          <ContactBlock supportEmail={supportEmail} />

          <SignatureBlock 
            name={senderName} 
            role={senderRole} 
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

export default TravelDocumentsEmail;
