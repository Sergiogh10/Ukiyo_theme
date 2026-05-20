import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { PaymentSummary } from '../components/PaymentSummary';
import { CTAButton } from '../components/CTAButton';
import { ContactBlock } from '../components/ContactBlock';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockPaymentData } from '../data/mockData';

interface PaymentRequestEmailProps extends CommonEmailProps {
  amount?: string;
  dueDate?: string;
  concept?: string;
  paymentUrl?: string;
}

export const PaymentRequestEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  amount = mockPaymentData.amount,
  dueDate = mockPaymentData.dueDate,
  concept = mockPaymentData.concept,
  paymentUrl = mockPaymentData.paymentUrl,
}: PaymentRequestEmailProps) => {
  const previewText = 'Información para completar el pago de tu viaje.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Te escribo para dejarte la información del próximo paso administrativo de tu viaje.
          </Paragraph>
          <Paragraph>
            A continuación, encontrarás el resumen del importe pendiente para formalizar este tramo de la reserva. Puedes revisar el concepto y la fecha límite en la tabla que te dejamos abajo.
          </Paragraph>

          <PaymentSummary 
            amount={amount}
            dueDate={dueDate}
            concept={concept}
          />

          <CTAButton href={paymentUrl}>
            Completar el pago de forma segura
          </CTAButton>

          <Paragraph>
            Una vez recibido, te confirmaremos la recepción de inmediato para que tengas total tranquilidad.
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

export default PaymentRequestEmail;
