import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { TripSummary } from '../components/TripSummary';
import { Divider } from '../components/Divider';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockTripData } from '../data/mockData';

interface BookingConfirmedEmailProps extends CommonEmailProps {
  destination?: string;
  departureDate?: string;
  returnDate?: string;
  travelersCount?: number;
}

export const BookingConfirmedEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  destination = mockTripData.destination,
  departureDate = mockTripData.departureDate,
  returnDate = mockTripData.returnDate,
  travelersCount = mockTripData.travelersCount,
}: BookingConfirmedEmailProps) => {
  const previewText = 'Tu viaje ya está confirmado.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">¡Tu viaje ya es real, {clientName}!</SectionTitle>
          <Paragraph>
            Qué gran noticia. Acabamos de confirmar todas las reservas y dejar formalizado el itinerario. Tu aventura a {destination} está oficialmente en marcha.
          </Paragraph>
          
          <TripSummary 
            destination={destination}
            departureDate={departureDate}
            returnDate={returnDate}
            travelersCount={travelersCount}
          />

          <Paragraph>
            Hemos asegurado todos los alojamientos especiales y los vuelos acordados. Te enviaremos un próximo correo con los detalles para la firma de la documentación y los próximos pasos previos al viaje.
          </Paragraph>
          <Paragraph>
            Poco a poco te iremos guiando y compartiendo toda la información clave, curiosidades y tips locales para que llegues a tu destino con todo preparado y la mente lista para disfrutar.
          </Paragraph>
          
          <Divider />
          
          <Paragraph>
            Gracias por confiar en UKIYO para diseñar esta experiencia. 
          </Paragraph>

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

export default BookingConfirmedEmail;
