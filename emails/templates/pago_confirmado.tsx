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

export const PaymentConfirmedEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
}: CommonEmailProps) => {
  const previewText = 'Hemos recibido tu pago correctamente.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Solo te escribo un correo rápido para confirmarte que hemos recibido tu pago correctamente.
          </Paragraph>
          <Paragraph>
            Queremos que tengas la tranquilidad de que todo sigue su curso y cada detalle de la ruta está avanzando según lo previsto. 
          </Paragraph>
          <Paragraph>
            Poco a poco iremos avanzando con el diseño de tu documentación y las actividades sobre el terreno. Ya sabes que estamos a tu lado durante todo el proceso.
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

export default PaymentConfirmedEmail;
