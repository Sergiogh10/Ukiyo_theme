import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps } from '../data/mockData';

export const InquiryReceivedEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
}: CommonEmailProps) => {
  const previewText = 'Hemos recibido tu solicitud de viaje en UKIYO.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Te escribo para confirmarte que hemos recibido correctamente tu solicitud de viaje. Qué ilusión que hayas pensado en UKIYO para tu próxima aventura.
          </Paragraph>
          <Paragraph>
            En este momento estamos revisando la información que nos has enviado sobre tus preferencias, fechas y estilo de viaje. Queremos asegurarnos de entender a la perfección qué tipo de experiencia buscas para proponerte algo realmente especial y a medida.
          </Paragraph>
          <Paragraph>
            Me pondré en contacto contigo en las próximas 48 horas con nuestras primeras impresiones y los siguientes pasos para empezar a dar forma a tu viaje.
          </Paragraph>
          <Paragraph>
            Si mientras tanto te surge cualquier idea o detalle que quieras añadir, puedes responder directamente a este correo.
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

export default InquiryReceivedEmail;
